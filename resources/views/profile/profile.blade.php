@extends('layouts.main')

@section('title')
    Profile
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Profile</h3>
    </div>
</div>
<div class="row ">
    <div class="col-lg-12">         
        <div class="panel panel-default">
            <div class="panel-heading">
                Customer Information
            </div>
            <div class="panel-body">
                <Strong>Account No.: </Strong>{{ $user->applicant_account_no }}
                <br>
                <br>
                <Strong>Last Name: </Strong>  {{$user->applicant_lastname}}
                <br>
                <br>
                <Strong>First Name: </Strong> {{$user->applicant_firstname}}
                <br>
                <br>
                <Strong>Middle Name: </Strong> {{$user->applicant_middlename}}      
                <br>
                <br>
                <Strong>Spouse/Co-Member: </Strong> {{$user->co_member}}  
                <br>
                <br>
                <Strong>Contact No: </Strong> {{$user->applicant_mobile_no}}
                <br>
                <br>
                <Strong>Insurance No: </Strong> {{$user->insurance_no}}  
                <br>
                <br>
                <Strong>Costumer Type: </Strong> {{$user->consumer_type}}  
                <br>
                <br>
                <Strong>Account Status: </Strong> {{$user->status_connection_name}}  
                </div>
        </div>          
    </div>
</div>
<div class="row ">
    <div class="col-lg-12">         
        <div class="panel panel-default">
            <div class="panel-heading">
                Address Information
            </div>
            <div class="panel-body">
                <Strong>House No.: </Strong> {{ $address->house_no }}
                <br>
                <br>
                <Strong>Street: </Strong>  {{$address->street_name}}
                <br>
                <br>
                <Strong>Purok: </Strong> {{$address->puroksitio_name}}
                <br>
                <br>
                <Strong>Subd/Village: </Strong> {{$address->subdvill_name}}      
                <br>
                <br>
                <Strong>Barangay: </Strong> {{$address->brgy_name}}  
                <br>
                <br>
                <Strong>City/Town: </Strong> {{$address->citytown_name}}
                <br>
                <br>
                <Strong>Landmarks: </Strong> {{$address->landmark}}
                </div>
        </div>          
    </div>
</div>
@endsection
