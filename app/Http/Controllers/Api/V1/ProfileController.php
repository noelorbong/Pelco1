<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Auth;


class ProfileController extends Controller
{
    public function profile()
    {
        $username = Auth::user()->username;
    	$user = User::whereUsername($username)->first();

    	return $user;
    }

    public function locationSave()
    {
        $username = Auth::user()->username;
    	$user = User::whereUsername($username)->first();

    	return $user;
    }


    public function location($userid){
        $location = DB::table('userlocation')
         ->select('*')
         ->where('user_id','=', $userid)
         ->get(1);

        return $location;
    }
}
