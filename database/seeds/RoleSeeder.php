<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'id'=>1,
            'name'=>'Admin',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ],
            [
                'id'=>2,
                'name'=>'User',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id'=>3,
                'name'=>'Adwiser',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        );
    }
}
