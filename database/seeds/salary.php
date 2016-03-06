<?php

use Illuminate\Database\Seeder;

class salary extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert(array(
            array('currency' => 'UAH', 'index' => 1),
            array('currency' => 'USD', 'index' => 26),
        ));
    }
}
