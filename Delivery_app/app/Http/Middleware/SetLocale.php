<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = $request->header('Accept-Language', 'en');
        Log::info("SetLocale Middleware executed. Locale: $locale");
        App::setLocale($locale);

        return $next($request);
    }
}
