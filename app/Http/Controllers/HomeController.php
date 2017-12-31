<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\RequestModel;
use App\Training;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $requests = RequestModel::all()
                    ->where('status', '!=', 1)
                    ->where('status', '!=', 3);
        $trainings = Training::all();
        $pending = RequestModel::where('status', 0)
                    ->count();
        $upcoming = RequestModel::where('status', 1)
                    ->count();
        $completed = RequestModel::where('status', 3)
                    ->count();
        // $tstaffs = User::where('isStaff', 1)
        //             ->count();
        $tstaffs = 6;
        // dd($requests[0]->user->name);
        return view('room.home', ['user' => $user, 'requests' => $requests, 'trainings' => $trainings, 'pending' => $pending, 'upcoming' => $upcoming, 'completed' => $completed, 'tstaffs' => $tstaffs]);
    }
}
