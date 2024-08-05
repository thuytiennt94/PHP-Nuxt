<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckUserRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\PasswordService;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    protected $passwordService;

    public function __construct(PasswordService $passwordService)
    {
        $this->passwordService = $passwordService;
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function checkUser(CheckUserRequest $request)
    {
        $result = $this->passwordService->checkUser($request->username, $request->full_name);

        if ($result) {
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'fail'], 404);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $this->passwordService->changePassword($request->username, $request->new_password);

        return response()->json(['status' => 'success']);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'full_name' => 'required|string',
        ]);

        // Check if user exists
        $user = $this->passwordService->checkUser($request->username, $request->full_name);

        if (!$user) {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }

        // Here you can generate and send the password reset link
        // For simplicity, let's assume you just want to return a success message
        return response()->json(['status' => 'success']);
    }
}
