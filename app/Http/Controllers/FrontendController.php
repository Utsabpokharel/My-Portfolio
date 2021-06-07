<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'desc')->first();
        return view('Frontend.Layout.master', compact('user'));
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credential = $request->only('email', 'password');
            // dd($credential);
            if (Auth::attempt($credential)) {
                // return 'done';
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->withErrors('Invalid Credentials !!!');
            }
        }
        return view('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}