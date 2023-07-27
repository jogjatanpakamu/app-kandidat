<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {

        return view('login');
    }


    public function login(Request $request)
    {

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('candidate');
        }
        return back();
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
