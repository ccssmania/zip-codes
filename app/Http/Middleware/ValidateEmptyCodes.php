<?php

namespace App\Http\Middleware;

use App\Models\ZipCode;
use Closure;
use Illuminate\Http\Request;

class ValidateEmptyCodes
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
        $exitsZips = ZipCode::first();
        if ($exitsZips) {
            return redirect()->route('zip-exists');
        }
        return $next($request);
    }
}
