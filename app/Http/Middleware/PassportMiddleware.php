<?php
/**
 * Created by PhpStorm.
 * User: 13458
 * Date: 2018/11/30
 * Time: 22:08
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PassportMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $params = $request->post();


        if (array_key_exists('provider', $params)) {
            Config::set('auth.guards.api.provider', $params['provider']);
        }
        return $next($request);
    }
}
