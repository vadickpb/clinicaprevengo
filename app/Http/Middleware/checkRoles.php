<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $roles = array_slice(func_get_args(), 2);

        foreach ($roles as  $role)
        {
            foreach (auth()->user()->roles as $userRole)
            {
                if ($userRole->nombre === $role)
                {
                    return $next($request);
                }
            }
        }

        return redirect('/admin');
    }
}
