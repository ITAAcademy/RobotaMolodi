<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	protected $except = [
		'upfile',
        'upimg',
        'client_id',
        'request_token',
        'access_token',
	];

	public function handle($request, Closure $next)
	{
		return parent::handle($request, $next);
	}

}
