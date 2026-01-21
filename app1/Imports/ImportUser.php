<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Hash;
use Illuminate\Support\Facades\Mail;

class ImportUser implements ToCollection, WithStartRow
{
    protected $returnAbortData = [];

    /**
     * Define the starting row for reading data
     */
    public function startRow(): int
    {
        return 2; // Skip the header row
    }

    /**
     * Process the rows in the uploaded file
     */
    public function collection(Collection $rows)
    {
        $abortData = [];

        if (count($rows) > 0) {
            // dd($rows);
            foreach ($rows as $row) {

                // Check if correct sheet
                if (count($row->toArray()) < 5 ) {
                    // Check if all required fields are present
                    if (!empty($row[1]) && !empty($row[2]) && !empty($row[3])) {
                        // Validate email format
                        if (!filter_var($row[2], FILTER_VALIDATE_EMAIL)) {
                            $row['4'] = 'Invalid email format';
                            array_push($abortData, $row);
                            continue;
                        }

                        // Check for duplicate email
                        if (User::where('email', $row[2])->exists()) {
                            $row['4'] = 'User Email already exists';
                            array_push($abortData, $row);
                            continue;
                        }
                        // check phone number in digits
                        if (!ctype_digit($row[3])) {
                            $row['4'] = 'User Phone Number must be digits.';
                            array_push($abortData, $row);
                            continue;
                        }
                        // Corrected: Check if not exactly 10 digits
                        if (strlen($row[3]) != 10) {
                            $row['4'] = 'User Phone Number must be exactly 10 digits.';
                            array_push($abortData, $row);
                            continue;
                        }
                        // check phone number exist or not
                        if (User::where('phone', $row[3])->exists()) {
                            $row['4'] = 'Phone No. already exists';
                            array_push($abortData, $row);
                            continue;
                        }
                        // Fixed the random OTP generation
                        $password = rand(100000, 999999);
                        $emailId = $row[2];
                        $title = 'Hi ' . $row[1];
                        $subject = 'Buda App - New Password Creation!';
                        $email_data = ['email' => $emailId];
                        # Send password to user's email
                        Mail::send('admin.user_management.email.user_registration', ['title' => $title, 'password' => $password], function ($message) use ($email_data, $subject) {
                            $message->from(env('ADMIN_FROM_EMAIL'), 'Buda App');
                            $message->to($email_data['email']);
                            $message->subject($subject);
                        });

                        // Save user data
                        $user        = new User;
                        $user->name  = $row[1];
                        $user->email = $row[2];
                        $user->phone = $row[3];
                        $user->password = $password;
                        $user->show_password = $password;
                        $user->save();
                    } else {
                        $row['4'] = 'Missing required fields';
                        array_push($abortData, $row);
                    }
                }
                else{
                    $row['4'] = 'You have uploaded the wrong sheet.';
                    array_push($abortData, $row);

                }
            }
        } else {
            $abortData[] = ['Error' => 'Uploaded sheet is empty'];
        }

        $this->returnAbortData = $abortData;
    }

    /**
     * Retrieve aborted rows with errors
     */
    public function allAbortData()
    {
        return $this->returnAbortData;
    }
}
