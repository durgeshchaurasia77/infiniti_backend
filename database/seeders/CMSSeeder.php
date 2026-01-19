<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CMS;

class CMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       # initialize Providers
       $comtentmanagements = [
        [
            'name'       => 'Privacy Policy',
            'short_name' => 'privacy_policy',
            'details'    => 'Privacy Policy Details',
        ],
        [
            'name'       => 'Term & Condition',
            'short_name' => 'term_condition',
            'details'    => 'Term & Condition Details',
        ],
        [
            'name'       => 'Disclaimer',
            'short_name' => 'disclaimer',
            'details'    => 'Disclaimer Details',
        ]

    ];

        foreach ($comtentmanagements as $key => $data)
        {

            CMS::updateOrCreate([
                        'name'       => $data['name'],
                        'short_name' => $data['short_name'],
                        'details'    => $data['details']
                    ]);

        }
    }
}
