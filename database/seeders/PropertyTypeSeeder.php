<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $propertyTypes = [
            ['name' => 'Villa', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Flat', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Apartment', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'House', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cottage', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bungalow', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Penthouse', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Duplex', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Studio', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Townhouse', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mansion', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Condominium', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Loft', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cabin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chalet', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Farmhouse', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Castle', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ranch', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mobile Home', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tiny House', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($propertyTypes as $type) {
            DB::table('property_types')->updateOrInsert(
                ['name' => $type['name']],
                ['created_at' => $type['created_at']],
                ['updated_at' => $type['updated_at']]
            );
        }
    }
}
