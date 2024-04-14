<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{

    public function handle(Request $request, Closure $next, $allowedUserTypes)
    {

        if (Auth::check()) {
            $user = Auth::user();

            // $userType = Auth::user()->typeUser->name;
        }

        // if (!$this->checkHierarchy($userType, $allowedUserTypes)) {
        //     return abort(403, 'Forbidden');
        // }

        // Verifica se o tipo de usuário do usuário autenticado 
        // if (Auth::user()->typeUser->name !== $userType) {
        //     return abort(403, 'Forbidden');
        // }

        // return $next($request);
    }

    private function checkHierarchy($userType, $allowedUserTypes)
    {
        $hierarchy = [
            'SysAdmin' => ['SysAdmin', 'Admin', 'Funcionário', 'Cliente'],
            'Admin' => ['Admin', 'Funcionário', 'Cliente'],
            'Funcionário' => ['Funcionário', 'Cliente'],
            'Cliente' => ['Cliente']
        ];

        return in_array($userType, $hierarchy[$allowedUserTypes]);
    }

}
