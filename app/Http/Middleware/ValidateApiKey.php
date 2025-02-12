<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ApiKey;
use Illuminate\Support\Facades\Cache;

class ValidateApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('X-API-KEY');

        if (!$apiKey) {
            return response()->json(['message' => 'API Key required'], 401);
        }

        // Cache API key validation to reduce DB queries
        $isValid = Cache::remember("api_keys:$apiKey", now()->addMinutes(10), function () use ($apiKey) {
            return ApiKey::where('api_key', $apiKey)->where('is_active', true)->exists();
        });

        if (!$isValid) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
