<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = '', $role2 = '')
    {
        $user = $request->user();

        if ($user)
        {
            $userType = $user->userType()->description;
            $checkUserType = 0;
            if (($userType == $role || $userType == $role2) && $role == 'Admin')
            {
                $checkUserType = 1;
            }
            elseif (($userType == $role || $userType == $role2) && $role == 'Teacher')
            {
                $checkUserType = 1;
            }
            elseif (($userType == $role || $userType == $role2) && $role == 'Student')
            {
                $checkUserType = 1;
            }

            if ($checkUserType == 1)
            {
                return $next($request);
            }
            else
            {
                return abort(401);
            }
        }
        else {
            return abort(401);
        }
    }
}
