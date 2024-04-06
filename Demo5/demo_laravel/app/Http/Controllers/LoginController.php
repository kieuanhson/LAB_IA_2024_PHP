<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function doGet()
    {
        return view('login');
    }

    public function doPost(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['username'=>$request->username, 'password'=>$request->password]))
        {
            $request->session()->regenerate();

            return redirect()->intended('student');
        }

        return back()
            ->withErrors(['username'=>'Cannot login to this system.'])
            ->onlyInput('username');
    }

    public function doLogout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
