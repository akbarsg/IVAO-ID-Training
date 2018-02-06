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

    private $user;

    public function __construct()
    {
        // $this->middleware('auth');
        $this->user = Auth::user();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            
                return redirect('dashboard');
            
        } else {

            if (isset($_GET['IVAOTOKEN'])) {
                // dd($_GET['IVAOTOKEN']);
                return redirect('ivaologin')->with('IVAOTOKEN', $_GET['IVAOTOKEN']);
            } else {
                return view('awal');
            }
        }
        
    }

    public function staff()
    {
        if(Auth::check()){
            if(Auth::user()->isStaff == 1) {
                $user = Auth::user();
                if (Auth::user()->staff_email == null) {
                    return view('room.staffemail', ['user' => $user]);
                } else {
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

                    $mytrainings = Training::where('trainer_id', $user->id)
                    ->get();
                    // $mytrainings = DB::table('trainings')
                    //     ->leftJoin('requests', 'trainings.request_id', '=', 'requests.id')
                    //     ->where('status', 1)
                    //     ->where('trainer_id', $user->id)
                    //     ->get();
                        // dd($mytrainings);
                    // dd($requests[0]->user->name);
                    return view('room.home', ['user' => $user, 'requests' => $requests, 'trainings' => $trainings, 'pending' => $pending, 'upcoming' => $upcoming, 'completed' => $completed, 'tstaffs' => $tstaffs, 'mytrainings' => $mytrainings]);
                }
            } else {
                return redirect('dashboard');
            }
        } else {
            return redirect('dashboard');
        }
    }
}
