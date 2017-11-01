<?php

class ScompanyTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/scompany');

		$this->assertResponseOk();
	}

}
