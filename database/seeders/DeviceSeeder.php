<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->insert([
            'name' => 'thunder dude',
            'model' => 'thunder',
            'manufacturer_id'=> 1,
            'serial_number'=> '123456780',
            'created_at' => date('Y-m-d H:i:s'),
            
        ]);

        DB::table('devices')->insert([
            'name' => 'white match',
            'model' => 'white',
            'manufacturer_id'=>2,
            'serial_number'=> '123456781',
            'created_at' => date('Y-m-d H:i:s'),
            
        ]);

         DB::table('devices')->insert([
            'name' => 'dark owl',
            'model' => 'dark',
            'manufacturer_id'=>3,
            'serial_number'=> '123456782',
            'created_at' => date('Y-m-d H:i:s'),
            
        ]);
        
        DB::table('devices')->insert([
            'name' => 'light speed',
            'model' => 'speedster',
            'manufacturer_id'=>2,
            'serial_number'=> '123456783',
            'created_at' => date('Y-m-d H:i:s'),
            
        ]);
        
        DB::table('devices')->insert([
            'name' => 'lightning pos+',
            'model' => 'lightning z',
            'manufacturer_id'=>4,
            'serial_number'=> '123456784',
            'created_at' => date('Y-m-d H:i:s'),
            
        ]);
        
        DB::table('devices')->insert([
            'name' => 'slim black',
            'model' => 'slim z',
            'manufacturer_id'=>2,
            'serial_number'=> '123456785',
            'created_at' => date('Y-m-d H:i:s'),
            
        ]);
    }
}