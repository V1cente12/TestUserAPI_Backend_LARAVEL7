<?php

namespace App\Http\Controllers;

use App\UserApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserApiController extends Controller
{
    /**
     * Get all users.
     *
     * This method retrieves all users from the database and returns them
     * as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $users = UserApi::all();
        return response()->json($users);
    }

    /**
     * Get a user by ID.
     *
     * This method retrieves a single user from the database based on the provided
     * user ID. If the user is found, it returns the users data as a JSON response.
     * If the user is not found, it returns a 404 error with an appropriate message.
     *
     * @param  int  $id  The ID of the user to retrieve.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserById($id){
        $user = UserApi::find($id);

        if (!$user){
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    /**
     * Create a new user.
     *
     * This method validates the incoming request data, creates a new user in
     * the database, and returns a success message along with the newly created user.
     * If the validation fails, it returns a 400 error with the validation errors.
     *
     * @param  \Illuminate\Http\Request  $request  The incoming request containing the user data.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'uid'           => 'nullable|string|unique:userapi,uid', 
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'email'         => 'required|email|unique:userapi,email',
            'password'      => 'required|string',
            'address'       => 'nullable|string',
            'phone'         => 'nullable|string',
            'phone_2'       => 'nullable|string',
            'postal_code'   => 'nullable|string',
            'birth_date'    => 'nullable|date',
            'gender'        => 'nullable|string|max:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        
        $user = UserApi::create([
            'uid'           => Str::uuid(),
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'address'       => $request->address,
            'phone'         => $request->phone,
            'phone_2'       => $request->phone_2,
            'postal_code'   => $request->postal_code,
            'birth_date'    => $request->birth_date,
            'gender'        => $request->gender,
        ]);

        return response()->json([
            'message' => 'User created successfully!!',
            'user' => $user
        ], 201);
    }

    /**
     * Update a user by ID.
     *
     * This method validates the incoming request data, finds the user by their ID,
     * and updates their data in the database. If the user is not found, it returns a
     * 404 error with a message. If the validation fails, it returns a 400 error.
     *
     * @param  \Illuminate\Http\Request  $request  The incoming request containing the updated user data.
     * @param  int  $id  The ID of the user to update.
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'uid'           => 'required|string|unique:userapi,uid,' . $id,
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'email'         => 'required|email|unique:userapi,email,' . $id,
            'password'      => 'nullable|string',
            'address'       => 'nullable|string',
            'phone'         => 'nullable|string',
            'phone_2'       => 'nullable|string',
            'postal_code'   => 'nullable|string',
            'birth_date'    => 'nullable|date',
            'gender'        => 'nullable|string|max:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $user = UserApi::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update([
            'uid'           => $request->uid,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => $request->has('password') ? bcrypt($request->password) : $user->password,
            'address'       => $request->address,
            'phone'         => $request->phone,
            'phone_2'       => $request->phone_2,
            'postal_code'   => $request->postal_code,
            'birth_date'    => $request->birth_date,
            'gender'        => $request->gender,
        ]);

        return response()->json([
            'message' => 'User updated successfully!!',
            'user' => $user
        ], 201);
    }

    /**
     * Delete a user by ID.
     *
     * This method finds a user by their ID and deletes the user from the database.
     * If the user is not found, it returns a 404 error with a message.
     *
     * @param  int  $id  The ID of the user to delete.
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $user = UserApi::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully!!']);
    }
}
