<?php

namespace App\Http\Middleware;

use Closure;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $level)
    {
	   if(\Auth()->user()->level == $level) :
		
			return redirect('menu');
		
	   endif;
	
        return $next($request);
    }
}
