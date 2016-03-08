<?php

use Illuminate\Database\Seeder;

class money extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::update('update vacancies set salary_max = 60000');
        DB::update('update resumes set salary_max = 60000');

        DB::update('update vacancies set currency_id = 1');
        DB::update('update resumes set currency_id = 1');
    }
}
