@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Map</h3>
    </div>
</div>
<div class="row ">
    <div class="col-md-12">         
        <router-view name="profileLocation"></router-view>            
    </div>
</div>
@endsection
