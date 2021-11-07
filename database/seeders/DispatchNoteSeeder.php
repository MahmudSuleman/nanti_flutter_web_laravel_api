<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DispatchNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('dispatch_notes')->insert([
           'client_id' => 1,
            'note' => 'This is a test note',
            'note_date' => '10/7/2021',
            'created_at' => now(),
        ]);
        
        Db::table('dispatch_notes')->insert([
           'client_id' => 2,
            'note' => 'This is a test note 2',
            'note_date' => '10/7/2021',
            'created_at' => now(),
        ]);
    }
}