<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LayoutMiddleware
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
        $validLayouts = ['list', 'grid'];
        $layout = $request->query('layout', 'list');

        if (!in_array($layout, $validLayouts)) {
            $layout = 'list'; // Fallback to 'list' if invalid
        }

        // Store the layout in the request for access in controllers
        $request->attributes->set('layout', $layout);

        return $next($request);
    }
}
