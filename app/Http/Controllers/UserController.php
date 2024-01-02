<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $validatedData = $validator->validated();

        $validatedData['password'] = bcrypt($request->password);
        $user = User::create($validatedData);
         $token = $user->createToken('token-name')->plainTextToken;
         return response()->json(['access_token' => $token]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = $request->user();
        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json(['access_token' => $token]);
    }

    public function sendEmail()
    {
        $to = 'djordjijevujovic210306@gmail.com'; // Recipient's email address
        $subject = 'Test Email'; // Email subject
        $message = 'This is a test email from the Laravel application.'; // Email message content

        // Use the Mail facade to send an email
        Mail::to($to)->send(new \App\Mail\TestEmail($subject, $message));

        return "Email sent!";
    }
}
