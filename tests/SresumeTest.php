<?php

class SresumeTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/sresume');

		$this->assertResponseOk();
	}

}
