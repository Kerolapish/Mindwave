<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class startSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $accounts = [
            [
                'name' => 'Primary-Admin',
                'email' => 'admin1st@mindwave.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'Secondary-Admin',
                'email' => 'admin2nd@gmail.com',
                'password' => bcrypt('password456'),
            ],
        ];

        DB::table('users')->insert($accounts);

        DB::table('site_properties')->insert([
            'downStatus' => true,
            'hasSetup' => false,
            'setupBrand' => false,
            'setupBackground' => false,
            'setupTitle' => false,
            'setupInfo' => false,
            'setupService' => false,
            'setupTeam' => false,
            'setupFooter' => false,
            'hasCompleteReg' => false
        ]);
    }
}
