<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typesCount = ClientType::all()->count();
        $client = ['apple', 'mango', 'pineapple', 'orange'];
        Client::insert([
            'name' => 'nanti systems',
            'contact' => 'admin@nantisystems.org',
            'client_type_id' => rand(1, $typesCount),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach($client as $c){
            Client::insert(['name' => $c, 'contact'=> "{$c}@{$c}.com", 'client_type_id' =>  rand(1, $typesCount)]);
        }



    }
}
