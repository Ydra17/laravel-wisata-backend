<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //index
    public function index()
    {
        $users = User::where('name', 'like', '%'.request('name').'%')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        // dd($user);
        return view('pages.user.index', ['type_menu' => 'user'], compact('users'));
    }

    public function create()
    {
        return view('pages.user.create', ['type_menu' => 'user']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User Created Successfully');
    }

    public function edit(User $user)
    {
        return view('pages.user.edit', ['type_menu' => 'user'], compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // if password updated
        if($request->password){
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User Updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Delete Successfully');
    }
}
