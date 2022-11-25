<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Task;

class Admin
{
    public function handle ($request, Closure $next)
    {
        $userRoles = json_decode($request->user()->role);
        if (in_array('admin', $userRoles)) {
            return $next($request);
        }
        return redirect('/login')->with('success', "You can't access that.");
    }
}
