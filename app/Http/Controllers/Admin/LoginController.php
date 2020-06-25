<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        ))
        {
            // Authentication passed...
            return redirect()->intended('dashboard/');
        }

        return redirect('dashboard/login')->with('error','Not Correct');
    }


    public function logout()
    {
        auth()->logout();
        return redirect('dashboard/login')->with('success','Logout');
    }
}
