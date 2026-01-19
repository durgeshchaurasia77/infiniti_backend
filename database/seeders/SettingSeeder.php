<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settingData = [
            [
                'email'   => 'example@gmail.com',
                'phone'   => '9878776767',
                'address' => '123 Street New York.USA',
                'website_url' => 'Yoursite@ex.com',
            ]

        ];

            foreach ($settingData as $key => $data)
            {

                Setting::updateOrCreate([
                            'email'      => $data['email'],
                            'phone'      => $data['phone'],
                            'address'    => $data['address'],
                            'website_url'=> $data['website_url'],
                        ]);

            }
    }
}
