<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use function PHPSTORM_META\type;

class CheckUserRole
{
   
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if( $this->hasPermission(strtolower($user->userType->name), strtolower($roles)) ){
            return $next($request);
        }

        return response()->json(['error' => 'Forbidden'], 403);
    }

    private function hasPermission($userRole, $allowedRoles)
    {
        $roleHierarchy = [
            'sysadmin',
            'admin' ,
            'funcionário',
            'cliente',

        ];

        return array_search($userRole, $roleHierarchy) <= array_search($allowedRoles, $roleHierarchy);       
    }
}
