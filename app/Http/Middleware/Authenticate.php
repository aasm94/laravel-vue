<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            return null; // Retorna null para indicar que no hay redirección
        } else {
            abort(401, 'Unauthenticated'); // Redirige solo si no es una solicitud JSON
        }
    }
}
