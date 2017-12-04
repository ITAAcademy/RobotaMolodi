<?php

use App\Models\City;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShowResumeTest extends TestCase {

    // Note: This trait will only wrap the default database connection in a transaction.
    use DatabaseTransactions;

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
        $resume = factory(App\Models\Resume::class)->create();

        $user = factory(App\Models\User::class)->create();
        $currency = factory(App\Models\Currency::class)->create();
        $industry = factory(App\Models\Industry::class)->create();
        $city = City::find(rand(1,26));

        $user->resumes()->save($resume);
        $currency->resumes()->save($resume);
        $industry->resumes()->save($resume);
        $city->resumes()->save($resume);

		$response = $this->call('GET', route('resume.show', ['resume' => $resume->id]));

		$this->assertResponseOk();
	}

}
