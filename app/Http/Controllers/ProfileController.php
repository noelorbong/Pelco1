<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumer_Application;
use Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile()
    {
        // $user = Auth::user()->get();
        // return $user;

        // $user = User::whereId($user)->first()
        $applicant_account_no = Auth::user()->applicant_account_no;
    	//$user = Consumer_Application::whereApplicant_account_no($applicant_account_no)->first();

        $user = Consumer_Application::leftjoin('consumer_master',
            'consumer_master.account_no', '=', 'consumer_application.applicant_account_no')
            ->leftjoin('member_personal', 'consumer_master.account_no_id', '=', 'member_personal.account_no_id')
            ->leftjoin('consumer_connection', 'consumer_master.account_no_id', '=', 'consumer_connection.account_no_id')
            ->leftjoin('consumer_type_lup', 'consumer_type_lup.consumer_type_id', '=', 'consumer_connection.consumer_type_id')
            ->leftjoin('status_connection_lup', 'consumer_connection.status_connection_id', '=', 'status_connection_lup.status_connection_id')
    		->select(DB::raw(
                'consumer_application.*,
                consumer_master.*,
                member_personal.*,
                consumer_type_lup.*,
                status_connection_lup.*
                '))
                ->where('consumer_application.applicant_account_no', '=', $applicant_account_no)
                ->first();

        $address = Consumer_Application::leftjoin('consumer_master',
            'consumer_master.account_no', '=', 'consumer_application.applicant_account_no')
            ->leftjoin('consumer_address', 'consumer_master.account_no_id', '=', 'consumer_address.account_no_id')
            ->leftjoin('street_lup', 'consumer_address.street_id', '=', 'street_lup.street_id')
            ->leftjoin('puroksitio_lup', 'consumer_address.puroksitio_id', '=', 'puroksitio_lup.puroksitio_id')
            ->leftjoin('subdvill_lup', 'consumer_address.subdvill_id', '=', 'subdvill_lup.subdvill_id')
            ->leftjoin('brgy_lup', 'consumer_address.brgy_id', '=', 'brgy_lup.brgy_id')
            ->leftjoin('citytown_lup', 'consumer_address.citytown_id', '=', 'citytown_lup.citytown_id')
    		->select(DB::raw(
                'consumer_address.*,
                street_lup.*,
                puroksitio_lup.*,
                subdvill_lup.*,
                brgy_lup.*,
                citytown_lup.*
                '))
                ->where('consumer_application.applicant_account_no', '=', $applicant_account_no)
                ->first();
        //return $user;
         return view('profile.profile', compact(['user','address']));

        //  return view('pro')
    }
}
