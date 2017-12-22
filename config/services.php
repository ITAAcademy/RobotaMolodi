<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'key' => '',
		'secret' => '',
	],

	'facebook' => [
    'client_id' => env('FB_CLIENT_ID'),
    'client_secret' => env('FB_CLIENT_SECRET'),
    'redirect' => 'https://robotamolodi.org/handleProviderCallback',
	],

	'github' => [
        'client_id'     => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect'      => 'https://robotamolodi.org/handleProviderCallback',
	],

	'twitter' => [
    'client_id' => env('TWITTER_CLIENT_ID'),
    'client_secret' => env('TWITTER_CLIENT_SECRET'),
    'redirect' => 'https://robotamolodi.org/handleProviderCallback',
	],

	'google' => [
    'client_id' => env('GOOGLE+_CLIENT_ID'),
    'client_secret' => env('GOOGLE+_CLIENT_SECRET'),
    'redirect' => 'https://robotamolodi.org/handleProviderCallback'
	],

	'linkedin' => [
	'client_id' => env('LINKEDIN_CLIENT_ID'),
	'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
	'redirect' => 'https://robotamolodi.org/handleProviderCallback'
	],

];
