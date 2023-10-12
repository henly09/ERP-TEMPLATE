<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = auth()->user();
    
        foreach ($roles as $role) {
            if ($user && $user->role == $role) {
                return $next($request);
            }
        }
    
        return abort(403, 'Unauthorized');
    }
    
}
