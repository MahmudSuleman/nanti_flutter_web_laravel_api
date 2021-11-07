<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DispatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dispatches')->insert([
            'client_id' => 1,
            'device_id' => 1,
            'note' =>'Dispatch note test 1',        
            'created_at' => '2019-01-01 00:00:00',
        ]);
        
        DB::table('dispatches')->insert([
            'client_id' => 1,
            'device_id' => 2,
            'note' =>'Dispatch note test 2',        
            'created_at' => '2019-01-01 00:00:00',
        ]);
          DB::table('dispatches')->insert([
            'client_id' => 2,
            'device_id' => 2,
            'note' =>'Dispatch note test 3',        
            'created_at' => '2019-01-01 00:00:00',
        ]);
    }
}