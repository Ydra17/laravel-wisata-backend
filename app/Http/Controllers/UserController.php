<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
