<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\RequestModel;
use App\User;
use App\Training;

class UserController extends Controller
{
    private $user;
    
    public function __construct()
    {
        // dd($training);
        $this->user = Auth::user();
    }

    public function showAll()
    {
    	$users = User::orderBy('isStaff', 'desc')->get();
    	$user = Auth::user();

    	return view('room.users', ['users' => $users, 'user' => $user]);
    }

    public function show($id)
    {
        $this->id = $id;

    	$profile = User::find($id);
    	$user = Auth::user();
        if ($profile->isStaff == 0) {
            $requests = RequestModel::where('trainee_id', $id)->get();
        } else {
            $requests = RequestModel::whereHas('training', function($query){
                $query->where('trainer_id', '=', $this->id);  
            })->get();


            // $requests = DB::table('requests')
            // ->join('trainings', 'requests.id', '=', 'trainings.request_id')
            // ->select('requests.*', 'trainings.*')
            // ->where('trainings.trainer_id', $id)
            // ->get();
        }
    	
    	// $trainings = Training::all();
        $trainings = Training::whereHas('request', function($query){
                $query->where('trainee_id', '=', $this->id);  
            })->get();
    	// dd($requests[0]->training);

    	return view('room.profile', ['profile' => $profile, 'user' => $user, 'requests' => $requests, 'trainings' => $trainings]);
    }

    public function setstaffemail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'confirm_email' => 'required|email',
        ]);

        if ($request->email == $request->confirm_email) {
            $user = User::find(Auth::user()->id);
            $user->staff_email = $request->email;
            $user->save();

            return redirect('room');
        } else {
            return back();
        }
    }

    public function assignasstaff($id)
    {
        $user = User::find(Auth::user()->id);
        if ($user->staff == 'ID-TC' || $user->staff == 'ID-TAC' || $user->staff == 'ID-WM' || $user->staff == 'ID-AWM' || $user->staff == 'ID-DIR' || $user->staff == 'ID-ADIR') {
            $newstaff = User::find($id);
            $newstaff->isStaff = 1;
            $newstaff->save();

            return back()->with('success','You just assigned an user as a staff!');
        } else {
            return back()->with('error','You are not eligible to assign an user as a staff!');
        }
    }

    public function unassignasstaff($id)
    {
        $user = User::find(Auth::user()->id);
        if ($user->staff == 'ID-TC' || $user->staff == 'ID-TAC' || $user->staff == 'ID-WM' || $user->staff == 'ID-AWM' || $user->staff == 'ID-DIR' || $user->staff == 'ID-ADIR') {
            $staff = User::find($id);
            $staff->isStaff = 0;
            $staff->save();

            return back()->with('success','You just unassigned an user as a staff!');
        } else {
            return back()->with('error','You are not eligible to unassign an user as a staff!');
        }
    }
}
