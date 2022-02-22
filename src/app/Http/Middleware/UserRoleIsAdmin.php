<?php

namespace App\Http\Middleware;

use Closure;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoleIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user === null){
            return redirect('main');
        }

        if ($user->role->name !== 'admin'){
            return redirect('main');
        }

        return $next($request);
    }
}
