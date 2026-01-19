<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                # arequest array
                $array = [
                    'name'          => 'Admin',
                    'email'         => 'admin@gmail.com',
                    'mobile'        => '9988776655',
                    'password'      => Hash::make('123456'),
                    'password_text' => '123456',
                ];
        $check1 = Admin::where('email','admin@gmail.com')->first();
        $check2 = Admin::where('mobile','9988776655')->first();
        if(!$check1 && !$check2) {
          $create = Admin::create($array);

        }
    }
}
