<?php

class ShowResumeTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
     public function testBasicExample()
    {
        $resume = factory(App\Models\Resume::class)->create();
        $response = $this->call('GET', route('resume.show', $resume->id));
        $this->assertResponseOk();
        //$resume->hardDelete();
    }

}
