<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth; // Ensure this line is present
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
      /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Exclude the specific route from middleware processing
        if ($request->is('exam/index')) {
            return $next($request);
        }
    
        // Example check: Ensure user is authenticated and is a student
        if (Auth::check() && Auth::user()->is_student) {
            return $next($request);
        }
    
        // Redirect or abort if check fails
        return redirect('/exam/index'); // Redirect to a page where the middleware is not applied
    }
    
}
