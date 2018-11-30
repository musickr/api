<?php
/**
 * Created by PhpStorm.
 * User: 13458
 * Date: 2018/11/30
 * Time: 22:12
 */

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate;
use Laravel\Passport\Http\Middleware\CheckClientCredentials;

class Custom
{
    /** 重新校验Auth2.0校验规则
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle($request, Closure $next) {
        // 1. new 校验(验证User表)

        $flags = 0;

        if ($flags == 0) {
            try {
                app(Authenticate::class)->handle($request, $next, 'api');
                $flags = 1;
            } catch (AuthenticationException $exception) {
                \Log::info(__METHOD__ . '|' . $exception->getMessage(), $exception->getTrace());
            }
        }

        // 2. old  校验（验证终端）

        if ($flags == 0) {
            try {
                app(CheckClientCredentials::class)->handle($request, $next);
                $flags = 1;
            } catch (AuthenticationException $exception) {
                \Log::info(__METHOD__ . '|' . $exception->getMessage(), $exception->getTrace());
            }
        }

        // 3. 小程序校验（验证UserCus表）

        if ($flags == 0) {
            try {
                app(Authenticate::class)->handle($request, $next, 'app');
                $flags = 1;
            } catch (AuthenticationException $exception) {
                \Log::info(__METHOD__ . '|' . $exception->getMessage(), $exception->getTrace());
            }
        }

        if ($flags == 0) {
            \Log::info(__METHOD__ . '|三种验证都失败了');
            throw new AuthenticationException();
        }

        return $next($request);
    }
}

