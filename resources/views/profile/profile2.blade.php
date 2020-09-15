@extends('layouts.app')
<style>
.mini-navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #e7e7e7;
    background-color: #f3f3f3;
}

.mini-navbar ul li {
    float: left;
}

.mini-navbar ul li a {
    display: block;
    color: #666;
    text-align: center;
    padding: 5px 16px;
    text-decoration: none;
}

.mini-navbar ul li a:hover:not(.active) {
    background-color: #4CAF50;
}

.mini-navbar ul li a.active {
    color: white;
    background-color: #4CAF50;
}
.profile-img{
		width:15%;
		border: 5px solid #fff;
		border-radius: 100%;
		box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
        /* display:block;
        margin:auto; */
	}
.profile-table{
    display:table;
    width:100%;
    table-layout:fixed;
}
</style>
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <!-- <img class ="profile-img" src="http://4.bp.blogspot.com/-Y6Iu7UaLrxE/VZ3QT7gALwI/AAAAAAAAQXs/xKPU4dC_wNA/s1600/good-mood-smiley.jpg">  -->
		<div class="panel panel-default">
        
			<div class="panel-body">
                <table class="profile-table">
                    <tr>
                        <td style="text-align:right; padding-right:15px;">
                            <img class ="profile-img" src="http://4.bp.blogspot.com/-Y6Iu7UaLrxE/VZ3QT7gALwI/AAAAAAAAQXs/xKPU4dC_wNA/s1600/good-mood-smiley.jpg"> 
                        </td>
                        <td style="">
                            <h3>{{ $user->firstname }}</h3>
                            <h5>{{ $user->email}}</h5> 
                        </td>
                    </tr>
                </table>           
            </div>

            <div class="mini-navbar">
                    <ul>
                    <li>
                    <a class="active">
                        <router-link :to="{name: 'profileAbout'}" >About</router-link>
                    </a>
                    </li>
                    <li>
                    <a>
                        <router-link :to="{name: 'profileLocation'}" >Location</router-link>
                    </a>
                    </li>
                    <li>
                    <a>
                        <router-link :to="{name: 'profileElectric'}" >Electric Consumption</router-link>
                    </a>
                    </li>
                    </ul>
            </div>
            
        </div>
        <div id="changeTab">
        <router-view name="profileAbout"></router-view>
        <router-view></router-view>
        </div>
      
	</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

//active state  
$(function() {
    $('.mini-navbar ul li a').click(function(e) {
        e.preventDefault();
        $('a').removeClass('active');
        $(this).addClass('active');
    });
});
});
</script>