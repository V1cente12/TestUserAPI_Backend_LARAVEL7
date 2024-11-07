<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\user;

class AuthenticateApi
{
    /**
     * handle incoming request and authenticate user based on api token.
     *
     * this middleware checks if the provided api token in the Authorization header
     * is valid. if the token exists in the database and is associated with a user,
     * the user will be authenticated for the request. if no token is provided or 
     * the token is invalid, a 401 Unauthorized response is returned.
     *
     * @param \Illuminate\Http\Request $request  the incoming request.
     * @param \Closure $next  the next middleware to be executed.
     * @return \Illuminate\Http\JsonResponse  response with error or the next middleware.
     */
    public function handle(Request $request, Closure $next)
    {
        //get the token from authorization header
        $token = $request->header('Authorization');

        //if no token is provided, return error
        if (!$token) {
            return response()->json(['error' => 'Token not provided'], 401);
        }

        //check if the token exists in the database
        $user = User::where('api_token', $token)->first();

        //if no user is found with that token, return error
        if (!$user) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        //authenticate the user for this request
        auth()->login($user);

        return $next($request);
    }
}
