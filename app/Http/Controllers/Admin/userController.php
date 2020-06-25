<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->get('pending') == "active") {
            $users = user::where('pending', 1)->get();
        } elseif (request()->get('pending') == "disable") {
            $users = user::where('pending', 0)->get();
        } else {
            $users = user::all();
        }

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
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
        $newUser->password = Hash::make(request('password'));
        $newUser->email = request('email');
        $newUser->birth_at = Carbon::parse(request('birth_at'))->format('Y-m-d');
        $newUser->pending = request('pending') ?: 0;
        $newUser->role_id = request('role') ?: 0;
        $newUser->gender = request('gender');
        $newUser->image = $path;

        $newUser->save();

        return redirect('dashboard/users')->with('success', 'successfully added');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        //return $request;

        $this->validate($request, [
            'name' => 'required|unique:users,name,' . $user->id . ',id',
            'email' => 'required|email|unique:users,email,' . $user->id . ',id',
            'birth_at' => 'required',
            'gender' => 'required',
        ]);

        // Upload photo
        if (request()->hasFile('image')) {
            $photoFile = request()->file('image');
            $ext = $photoFile->extension();
            $fileName = Str::random(5) . '.' . $ext;
            $folder = "uploads/";
            $path = $folder . $fileName;
            $photoFile->move($folder, $fileName);
            $user->image = $path;
        }

        $user->name = request('name');
        if (request('password')) {
            $user->password = Hash::make(request('password'));
        }
        $user->email = request('email');
        $user->birth_at = Carbon::parse($request->birth_at)->format('Y-m-d');
        $user->pending = request('pending');
        $user->role_id = request('role');
        $user->gender = request('gender');

        $user->save();
        return redirect('dashboard/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (is_file($user->image)) unlink($user->image);
        User::destroy($id);

        return redirect('dashboard/users');
    }
}
