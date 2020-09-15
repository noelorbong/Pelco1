<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumer_Application;
use Auth;
use Illuminate\Support\Facades\DB;

class ConsumptionController extends Controller
{
    public function consumption($year1,$year2){
        $applicant_account_no = Auth::user()->applicant_account_no;

        $consumption1 = Consumer_Application::leftjoin('consumer_master',
            'consumer_master.account_no', '=', 'consumer_application.applicant_account_no')
            ->leftjoin('consumer_bill', 'consumer_master.account_no_id', '=', 'consumer_bill.account_no_id')
            ->select(DB::raw(
                'consumer_bill.cutoff_month,
                consumer_bill.kwh_used,
                Consumer_bill.total_amount
                '))
                ->where('consumer_application.applicant_account_no', '=', $applicant_account_no)
                ->where('consumer_bill.cutoff_month', 'like', '%'.$year1.'%')
                ->get();
        
        $consumption2 = Consumer_Application::leftjoin('consumer_master',
            'consumer_master.account_no', '=', 'consumer_application.applicant_account_no')
            ->leftjoin('consumer_bill', 'consumer_master.account_no_id', '=', 'consumer_bill.account_no_id')
            ->select(DB::raw(
                'consumer_bill.cutoff_month,
                consumer_bill.kwh_used,
                Consumer_bill.total_amount
                '))
                ->where('consumer_application.applicant_account_no', '=', $applicant_account_no)
                ->where('consumer_bill.cutoff_month', 'like', '%'.$year2.'%')
                ->get();

        return compact(['consumption1','consumption2']);
       // return view('pages.electric', compact('consumptions'));
    }
}
