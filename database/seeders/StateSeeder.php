<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Cairo', 'country_id' => 1],
        ];

        foreach ($states as $state) {
            DB::table('states')->updateOrInsert(
                ['name' => $state['name']],
                ['country_id' => $state['country_id']]
            );
        }
    }
}
