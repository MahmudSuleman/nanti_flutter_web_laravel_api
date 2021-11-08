<?php

namespace Database\Seeders;

use App\Models\ClientType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ClientTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['sole', 'corporate'];
        for($i = 0; $i < 2 ; $i++){
            ClientType::insert([
                'name' => $types[$i],
                'created_at' => Carbon::now()
            ]);
        }

    }
}