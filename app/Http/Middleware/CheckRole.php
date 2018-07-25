<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 25/07/2018
 * Time: 18:59
 */

namespace App\Http\Middleware;

use Closure;
class CheckRole
{
    public function handle($request, Closure $next)
    {
        if($request->user() === null)
        {
            return response("Accès refusé", 401);
        }

        $actions = $request->route()->getAction();

        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if($request->user()->hasAnyRole($roles) || !$roles)
        {
            return $next($request);
        }

        return response("Accès refusé", 401);
    }
}