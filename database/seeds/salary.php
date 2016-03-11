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
        DB::table('vacancies')->insert([
            'salary_max' => 60000,
        ]);

        DB::table('vacancies')->insert([
            'salary_max' => 60000,
        ]);
    }
}
