<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumer_Application;
use Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function employees(){
        return view('pages.employee');
    }

    public function profile(){
        return view('profile.profile');
    }

    public function electric(){
        $applicant_account_no = Auth::user()->applicant_account_no;

        $meter = Consumer_Application::leftjoin('consumer_master',
            'consumer_master.account_no', '=', 'consumer_application.applicant_account_no')
            ->leftjoin('consumer_meter_info', 'consumer_master.account_no_id', '=', 'consumer_meter_info.account_no_id')
           ->leftjoin('pole_lup', 'consumer_meter_info.pole_id', '=', 'pole_lup.pole_id')
           ->leftjoin('feeder_lup', 'consumer_meter_info.feeder_id', '=', 'feeder_lup.feeder_id')
            ->select(DB::raw(
                'consumer_meter_info.*,
                pole_lup.pole_no,
                feeder_lup.*
                '))
                ->where('consumer_application.applicant_account_no', '=', $applicant_account_no)
                ->first();
        return view('pages.electric', compact('meter'));
    }

    public function location(){
        return view('pages.location');
    }
}
