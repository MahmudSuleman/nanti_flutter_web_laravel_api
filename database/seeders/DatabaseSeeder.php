<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientType;
use Database\Factories\ClientTypeFactory;
use Illuminate\Database\Seeder;
use Faker\Generator ;

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


        $this->call([
            ClientTypesSeeder::class,
            ClientsSeeder::class,
        ]);
    }
}
