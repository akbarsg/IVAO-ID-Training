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
    

    public function showAll()
    {
    	$users = User::all();
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
}
