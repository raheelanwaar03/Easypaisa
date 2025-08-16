<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class status
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->status == 'approved') {
            return $next($request);
        } elseif (auth()->user()->status == 'pending') {
            return redirect()->back()->with('error', 'Please wait for your account approval');
        } elseif (auth()->user()->status == 'rejected') {
            return redirect(route('Package.Details'))->with('error', 'Your account has been rejected please resubmit your form with correct details');
        }
    }
}
