<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Call all seeders in order
        
        $this->call([
        RoleSeeder::class,
        UserSeeder::class,
        AdminProfileSeeder::class,
        TownSeeder::class,
        PageSeeder::class,
        DocumentTypeSeeder::class,
        StructureTypeSeeder::class,
        StructureCategorySeeder::class,
        SpecialitySeeder::class,
        ServiceSeeder::class,
        PrestationSeeder::class,
        NeighborhoodSeeder::class,
        //StructureCategorySeeder::class,
        
    ]);
    }
}
