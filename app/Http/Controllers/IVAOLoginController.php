<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;

class IVAOLoginController extends Controller
{
    public function login()
    {
    	if(isset($_GET['IVAOTOKEN']) && $_GET['IVAOTOKEN'] !== 'error') {
            setcookie(\Config::get('ivao.cookie_name'), $_GET['IVAOTOKEN'], time()+3600);
            return redirect('/');
        } elseif(isset($_GET['IVAOTOKEN']) && $_GET['IVAOTOKEN'] == 'error') {
            //gak terotentikasi tokernya error
            return view('tokenerrormz');
        }

        if(isset($_COOKIE[\Config::get('ivao.cookie_name')])) {
            $user_array = json_decode(file_get_contents(\Config::get('ivao.api_url').'?type=json&token='.$_COOKIE[\Config::get('ivao.cookie_name')]));
            if($user_array->result) {
            //Success! A user has been found!
                // echo 'Hello '.utf8_decode($user_array->firstname).' '.utf8_decode($user_array->lastname).'!';
                // dd($user_array);
                $user = User::where('vid', $user_array->vid);
                if ($user->count() == 0) {
                    $user = new User;
                    $user->vid = $user_array->vid;
                    $user->name = $user_array->firstname . ' ' . $user_array->lastname;
                    $user->email = '';
                    $user->password = '';
                    $user->status = $user_array->rating;
                    $user->atc_rating_id = $user_array->ratingatc;
                    $user->pilot_rating_id = $user_array->ratingpilot;
                    $user->isStaff = '0';
                    $user->save();
                }

                $user = User::where('vid', $user_array->vid)->first();
                Auth::guard();
                Auth::loginUsingId($user->id);
                return redirect()->intended('dashboard');
                
            } else {
                return view('userarrayfalsemz');
            }
        } else {
            return view('kukigakesetmz');
        }
    }
}
