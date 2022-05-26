<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Configuration;

class Apli
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
        $configdb = Configuration::first();

        $config = [
            'id' => $configdb['id'],
            'title' => $configdb['title'],
            'logo' => $configdb['logo'],
            'seats' => $configdb['seats'],
        ];

        if (!$request->session()->exists('config')) {
            $request->session()->put('config', $config);
        }

        return $next($request);
    }
}
