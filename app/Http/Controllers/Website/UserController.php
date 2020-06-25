<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function getLogin(){
        return view('website.profile.login');
    }

    public function postLogin(){
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = request()->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }

        return redirect('login');
    }

    public function getSign()
    {
        return view('website.profile.sign');
    }

    public function postSign()
    {

        //return Request::all();


        $this->validate(request(), [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
            'birth_at' => 'required',
            'gender' => 'required',
            'image' => 'required',
        ]);


        if (request()->hasFile('image')) {
            $photoFile = request()->file('image');
            $ext = $photoFile->extension();
            $fileName = Str::random(5) . '.' . $ext;
            $folder = "uploads/";
            $path = $folder . $fileName;
            $photoFile->move($folder, $fileName);
        }

        $newUser = new User;
        $newUser->name = request('name');
        $newUser->email = request('email');
        $newUser->password = Hash::make(request('password'));
        $newUser->image = '$path';
        $newUser->gender = request('gender');
        $newUser->role_id = request('role') ?: 0;
        $newUser->pending = request('pending') ?: 0;
        $newUser->birth_at = Carbon::parse(request('birth_at'))->format('Y-m-d');

        $newUser->save();

       return redirect('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
