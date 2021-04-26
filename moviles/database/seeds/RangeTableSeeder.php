<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Range;


class RangeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Range::create(['rango'=>'0-10']);
        Range::create(['rango'=>'10-50']);
        Range::create(['rango'=>'50-100']);
        Range::create(['rango'=>'100-1000']);
        Range::create(['rango'=>'>1000']);
    }
}