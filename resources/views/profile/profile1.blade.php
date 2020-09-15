@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Profile</h3>
    </div>
</div>
<div class="row ">
    <div class="col-lg-12">         
        <router-view name="profileAbout"></router-view>            
    </div>
</div>
@endsection
