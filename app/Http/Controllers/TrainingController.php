<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\RequestModel;
use App\User;
use App\AtcRating;
use App\PilotRating;
use App\Training;
use App\History;

class TrainingController extends Controller
{
	public function requestForm()
	{
		$count = RequestModel::where('trainee_id', Auth::user()->id)->count();
		if ($count < 1) {
			$user = User::getByVID(Auth::user()->vid);
			$nextATCRating = AtcRating::getNextRating()->name;
			$nextPilotRating = PilotRating::getNextRating()->name;
			return view('request', ['user' => $user, 'nextATCRating' => $nextATCRating, 'nextPilotRating' => $nextPilotRating]);
		} else {
			return $this->dashboard();
		}
		
	}

	public function dashboard(){
		$user = Auth::user();
		$request = RequestModel::where('trainee_id', $user->id)
		->where('status', '!=', 3)
		->first();
		$pastRequest = RequestModel::where('trainee_id', $user->id)
		->where('status', '>=', 3)
		->get();
		
		if ($request->type == 1) {
			$nextRating = AtcRating::getNextRating()->name;
		} else {
			$nextRating = PilotRating::getNextRating()->name;
		}
		
		$status = array('Pending', 'Your request has not been reviewed yet. Please wait until a staff member assigned yours. You will be notified by email.', '#E65100');
		// dd($status);
		if ($request->status == 1) {
			$status[0] = 'Assigned';
			$status[1] = 'Your training request has been assigned! Please contact the assigned staff member.';
			$status[2] = '#43A047';
		} elseif ($request->status == 2) {
			$status[0] = 'Refused';
			$status[1] = 'Sorry, your training request has been refused.';
			$status[2] = '#EF5350';
		} elseif ($request->status == 3) {
			$status[0] = 'Completed';
			$status[1] = 'This training session has been finished!.';
			$status[2] = '#01579B';
		}
		return view('dashboard', ['user' => $user, 'request' => $request, 'pastRequest' => $pastRequest, 'status' => $status, 'nextRating' => $nextRating]);
	}

	public function storeRequest(Request $request)
	{
		$requestModel = new RequestModel;
		$requestModel->trainee_id = Auth::user()->id;
		$requestModel->email = $request->email;
		$requestModel->type = $request->type;
		$requestModel->atc_rating_id = $request->atc_rating_id;
		$requestModel->pilot_rating_id = $request->pilot_rating_id;
		$requestModel->training_time = $request->training_time;
		$requestModel->note = $request->note;
		$requestModel->save();

		return redirect('training');
	}

	public function deleteRequest($id){
		RequestModel::destroy($id);
		return redirect('training');
	}

	public function assignMe(Request $request)
	{
		$requestModel = RequestModel::find($request->request_id);
		$requestModel->status = 1;
		$requestModel->save();

		$training = new Training;
        $training->trainer_id = Auth::user()->id;
        $training->request_id = $request->request_id;
        $training->note = $request->note;
        $training->save();

        return back()->with('success','You just assign yourself as the trainer!');
	}

	public function unassignMe($id)
	{
		$request_id = Training::find($id)->request_id;
		// dd($request_id);

		$requestModel = RequestModel::find($request_id);
		$requestModel->status = 0;
		$requestModel->save();

		Training::destroy($id);

        return back()->with('success','You just unassign yourself from the training request.');
	}

	public function complete(Request $request)
	{
		$request_id = Training::find($request->training_id)
						->request
						->id;

		$requestModel = RequestModel::find($request_id);
		$requestModel->status = 3;
		$requestModel->save();

		$history = new History;
        $history->training_id = $request->training_id;
        $history->description = $request->description;
        $history->save();

        return back()->with('success','The training has been completed!');
	}

	public function showAll()
	{
		$trainings = Training::all();
		$user = Auth::user();

		return view('room.traininglist', ['trainings' => $trainings, 'user' => $user]);
	}

	public function showMine()
	{
		
		$user = Auth::user();
		$trainings = Training::where('trainer_id', $user->id)->get();

		return view('room.traininglist', ['trainings' => $trainings, 'user' => $user]);
	}

	public function showPending()
	{
		$requests = RequestModel::all()
                    ->where('status', '!=', 1)
                    ->where('status', '!=', 3);
		$user = Auth::user();

		return view('room.trainingpendinglist', ['requests' => $requests, 'user' => $user]);
	}
}
