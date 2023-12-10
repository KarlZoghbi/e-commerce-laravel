<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string',
            'age' => 'required|integer',
            'gender' => 'required|in:M,F', // Validate gender to be 'M' or 'F'
            'user_type_id' => 'nullable|exists:user_roles,user_type_id', // Validate user_type_id to exist in user_roles table
            'user_name' => 'required|string|max:255',
            // add other validation rules as needed
        ]);

        // Create a new user
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'user_type_id' => $request->input('user_type_id'),
            'user_name' => $request->input('user_name'),
            // add other fields as needed
        ]);

        return response()->json(['user' => $user], 201);
    }
    public function signin(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Check if the user exists
        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            // Invalid credentials
            return response()->json(['message' => 'Invalid email or password'], 401);
        }

        // You can customize the response as needed
        return response()->json(['user' => $user, 'message' => 'Signin successful'], 200);
    }

}
?>