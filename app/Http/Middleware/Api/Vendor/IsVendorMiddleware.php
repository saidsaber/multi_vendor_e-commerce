<?php

namespace App\Http\Middleware\Api\Vendor;

use Closure;
use Illuminate\Http\Request;
use App\Http\Trait\ApiResponse;
use Symfony\Component\HttpFoundation\Response;

class IsVendorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $user->tokenCan('vendor')) {
            return $next($request);
        }

        return ApiResponse::error(['error' => 'Invalid credentials'], 401);
    }
}
