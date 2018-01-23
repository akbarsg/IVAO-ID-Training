<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function readAll()
    {
    	$user = User::find(Auth::user()->id);

		$user->unreadNotifications()->update(['read_at' => Carbon::now()]);

		return back()->with('success','All notifications marked as read!');
    }

    public function read($id)
    {
    	$user = User::find(Auth::user()->id);

		$user->unreadNotifications()->update(['read_at' => Carbon::now()]);
    }
}
