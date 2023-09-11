<?php

namespace App\Http\Middleware;


class Authenticate extends ParentAuthenticateMiddleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request,$guards)
    {
        dd($guards);
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
