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
}
