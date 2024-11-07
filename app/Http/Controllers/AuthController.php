<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    /**
     * login and token creation.
     *
     * this method validates the users credentials (email and password), and if correct,
     * generates a new API token. the token is saved in the users record in the database
     * and returned in the response.
     *
     * if the credentials are incorrect, a 401 error (unauthorized) is returned.
     *
     * example:
     *
     * request body:
     * {
     *     "email": "admin@gmail.com",
     *     "password": "qwerty"
     * }
     *
     * @param \Illuminate\Http\Request $request  incoming request with the user's credentials.
     * @return \Illuminate\Http\JsonResponse  response with the generated token or an error message.
     */
    public function login(Request $request)
    {
        //get the credentials (email and password)
        $credentials = $request->only('email', 'password');

        //check if the credentials are correct
        if (Auth::attempt($credentials)) {
            //get the authenticated user
            $user = Auth::user();

            //generate a random 60 character token
            $token = Str::random(60);

            //save the token in the database
            $user->api_token = $token;
            $user->save();

            //return the token in the response
            return response()->json([
                'token' => $token
            ]);
        }

        //if authentication fails, return error
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
