<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Http\Middleware\TrustProxies as Middleware;

class JwtAdmin extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Application|ResponseFactory|Response
     */
    public function handle(Request $request, Closure $next): Response|Application|ResponseFactory
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response(['message' => 'Token is Invalid'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response(['message' => 'Token is Expired'], 401);
        } catch (\Exception $e) {
            return response(['message' => 'Authorization Token not found'], 401);
        }
        return $next($request);
    }
}
