<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['description' => 'Emergencia'],
            ['description' => 'VIP'],
            ['description' => 'Pasajero'],
            ['description' => 'Cargo']
        ];
        
        DB::table('type')->insert($types);
    }
}
