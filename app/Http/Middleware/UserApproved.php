<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class UserApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	if (Gate::check('access-approved')) {
		    return $next($request);
	    }
	    else {
    		return redirect(route('approval.unapproved'));
	    }

    }
}
