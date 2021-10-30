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
//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('client_types')->truncate();
        $types = ['sole', 'corporate'];
        for($i = 0; $i < 2 ; $i++){
            ClientType::insert([
                'name' => $types[$i],
                'created_at' => Carbon::now()
            ]);
        }

    }
}
