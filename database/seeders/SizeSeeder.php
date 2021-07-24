<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            ['description' => 'Chico'],
            ['description' => 'Grande'],
        ];
        
        DB::table('size')->insert($sizes);
    }
}
