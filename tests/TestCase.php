<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    //protected $baseUrl = 'http://rm.app/';
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('DB_HOST');
    }
	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

}
