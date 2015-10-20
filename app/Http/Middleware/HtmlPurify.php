<?php namespace App\Http\Middleware;

use Closure;


class HtmlPurify {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		$request->replace(clean($request->all()));

		return $next($request);

	}


}
