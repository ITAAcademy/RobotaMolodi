<?php

use App\Models\User;

class CabinetTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
     public function testApplication()
    {
        $user = new User();
        $user->name = str_random(10);
        $user->email = str_random(10).'@gmail.com';
        $user->password = bcrypt('secret');

        $this->actingAs($user)
             ->visit('/cabinet')
             ->see($user->name);
    }

}
