<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\RequestModel;
use App\User;

class UserController extends Controller
{
    public function showAll()
    {
    	$users = User::all();
    	$user = Auth::user();

    	return view('room.users', ['users' => $users, 'user' => $user]);
    }
}
