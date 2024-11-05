<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function authen(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('name', $username)->where('password', md5($password))->first();

        if ($user) {
            Session::put('user', $user->name);
            return redirect('companies');
        } else {
            $message = 'Invalid User or Password.';
            return redirect('login')->with('message', $message);
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('login')->with('message', 'Logout Successfully.');
    }
}
