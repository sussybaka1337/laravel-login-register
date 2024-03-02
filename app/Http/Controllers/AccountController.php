<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function checkUserLogin(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
        $checkLogin = auth()->attempt($credentials);
        if ($checkLogin) {
            return response()->json([
                'error' => false,
                'message' => 'Login successfully. Redirecting...'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Invalid username or password'
        ]);
    }
    public function storeRegistration(Request $request)
    {
        if ($request->password !== $request->againPassword) {
            return response()->json([
                'error' => true,
                'message' => 'Again password did not match'
            ]);
        }
        if (Account::where('username', $request->username)->count() > 0) {
            return response()->json([
                'error' => true,
                'message' => 'Username have already existed'
            ]);
        }
        $credentials = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email
        ];
        $success = Account::create($credentials);
        if ($success) {
            return response()->json([
                'error' => false,
                'message' => 'Register successfully. Redirect to login...'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Unexpected error...'
        ]);
    }
    public function login(Request $request)
    {
        return view('login');
    }
    public function register(Request $request)
    {
        return view('register');
    }
    public function home(Request $request)
    {
        $user = auth()->user();
        return view('home', ['user' => $user]);
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('login');
    }
}
