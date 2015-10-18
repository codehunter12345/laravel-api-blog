<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */



// Override hande() function to exclude Api routes for checking csrf token

	protected $except_urls = [
		'api/v1'
    ];

	public function handle($request, Closure $next)
	{
		$regex = '#' . implode('|', $this->except_urls) . '#';


		if ($this->isReading($request) || $this->tokensMatch($request) || preg_match($regex, $request->path()))
		{
			return $this->addCookieToResponse($request, $next($request));
		}

		throw new TokenMismatchException;
	}

}
