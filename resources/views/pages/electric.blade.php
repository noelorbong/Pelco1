@extends('layouts.main')
<style>
div#chartContent {
    height: 60vh;
    width: 100%;
}

tr#consumption1 td {
    font-size: 15px;
}
tr#consumption2 td {
    font-size: 15px;
}
tr#amount1 td {
    font-size: 15px;
}
tr#amount2 td {
    font-size: 15px;
}
</style>
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">Chart</h3>
    </div>
</div>
<div  class="row ">
    <div class="col-md-12">         
        <div class="panel panel-default">
            <div class="panel-heading">
                Meter Information
            </div>
            <div class="panel-body">
                <Strong>Meter Serial No.: </Strong> {{ $meter->serial_no }}
                <br>
                <br>
                <Strong>Date Installed: </Strong>  {{ $meter->date_installed }} 
                <br>
                <br>
                <Strong>Pole No.: </Strong> {{ $meter->pole_no }}
                <br>
                <br>
                <Strong>Feeder No.: </Strong> {{ $meter->feeder_code }}
        </div>          
    </div>
</div>

<div class="row ">
    <div class="col-md-12">         
        <div class="panel panel-default">
            <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Electrical Consumption
            </div>
            <div class="panel-body">
                <div id="chartContent">
                    <canvas id="mainChart"  width="100%" height="40vh"></canvas>
                </div>
            </div>
            <div class="panel-footer clearfix" style="background-color: white">
                <!-- <select id="yearSelect1" class="selectpicker" onChange="requestData();">
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016" selected>2016</option>
                    <option value="2015" >2015</option>
                </select> -->
                <select id="yearSelect2" class="selectpicker" onChange="requestData();">
                    <option value="2018" >2018</option>
                    <option value="2017">2017</option>
                    <option value="2016" selected>2016</option>
                    <option value="2015" >2015</option>
                </select>
			</div>
        </div>    
    </div>
</div>
<div  class="row ">
    <div class="col-md-12">         
        <div class="panel panel-default">
            <div class="panel-heading">
                Consumer Consumption Data
            </div>
            <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th id="year1"></th>
                        <th>JAN</th>
                        <th>FEB</th>
                        <th>MAR</th>
                        <th>APR</th>
                        <th>MAY</th>
                        <th>JUN</th>
                        <th>JUL</th>
                        <th>AUG</th>
                        <th>SEP</th>
                        <th>OCT</th>
                        <th>NOV</th>
                        <th>DEC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="consumption1">
                       
                        
                    </tr>
                    <tr id="amount1">
                    </tr>
                    
                </tbody>
            </table>
    </div>

    <div class="panel-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th id="year2"></th>
                        <th>JAN</th>
                        <th>FEB</th>
                        <th>MAR</th>
                        <th>APR</th>
                        <th>MAY</th>
                        <th>JUN</th>
                        <th>JUL</th>
                        <th>AUG</th>
                        <th>SEP</th>
                        <th>OCT</th>
                        <th>NOV</th>
                        <th>DEC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="consumption2">
                    </tr>
                    <tr id="amount2">
                    </tr>
                   
                </tbody>
            </table>
    </div>
</div>
@endsection

@section('customjs')
<script>
var myChart =null;
$(function(){
    requestData();
});

function requestData(selectedYear1,selectedYear2){
    // var e1 = document.getElementById("yearSelect1");
    // var selectedYear1 = e1.options[e1.selectedIndex].value;
    var e2 = document.getElementById("yearSelect2");
    var selectedYear1 = e2.options[e2.selectedIndex].value;
    var selectedYear2 = parseInt(selectedYear1) - 1;
    document.getElementById("year1").innerHTML = selectedYear1;
    document.getElementById("year2").innerHTML = selectedYear2;

    var consumption1 = "";
    var amount1 = "";
    var consumption2 = "";
    var amount2 = "";
    var month1 = [];
    var kwh_used1 = [];
    var month2 = [];
    var kwh_used2 = [];

    // $.ajax({url: "/consumption/"+selectedYear1+"/"+selectedYear2, success: function(consumptions){
    $.ajax({url: "/consumption/"+selectedYear1+"/"+selectedYear2, success: function(consumptions){
        // console.log(consumptions);
        $.each(consumptions.consumption1, function(i, item) {
            month1[i] = item.cutoff_month;
            kwh_used1[i] = item.kwh_used;
            consumption1 += "<td>"+item.kwh_used+"</td>"
            amount1 += "<td>"+item.total_amount+"</td>"
        });

         $.each(consumptions.consumption2, function(i, item) {
            month2[i] = item.cutoff_month;
            kwh_used2[i] = item.kwh_used;
            consumption2 += "<td>"+item.kwh_used+"</td>"
            amount2 += "<td>"+item.total_amount+"</td>"
        });
        document.getElementById('consumption1').innerHTML = '';
        document.getElementById('amount1').innerHTML = '';
        $('#consumption1').append("<td><b>Consumption</b></td>"+consumption1);
        $('#amount1').append("<td><b>Amount</b></td>"+amount1);

        document.getElementById('consumption2').innerHTML = '';
        document.getElementById('amount2').innerHTML = '';
        $('#consumption2').append("<td><b>Consumption</b></td>"+consumption2);
        $('#amount2').append("<td><b>Amount</b></td>"+amount2);

        //document.getElementById("consumption1").innerHTML = consumption1;
        consumption(month1, kwh_used1, month2, kwh_used2, selectedYear1, selectedYear2);
    }});
}

function consumption(month1, kwh_used1, month2, kwh_used2, year1, year2) {

            var pieChartContent = document.getElementById('chartContent');
            pieChartContent.innerHTML = '&nbsp;';
            $('#chartContent').append('<canvas id="mainChart"  width="100%" height="40vh" ><canvas>');

            ctx = $("#mainChart").get(0).getContext("2d"); 
        //    var ctx = document.getElementById("myChart").getContext('2d');
            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"],
                    // labels: month,
                    datasets: [{
                        label: year1+' Consumption',
                        data: kwh_used1,
                        // data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(115, 152, 252, 0.2)',
                            'rgba(115, 152, 252, 0.2)',
                            'rgba(115, 152, 252, 0.2)',
                            'rgba(115, 152, 252, 0.2)',
                            'rgba(115, 152, 252, 0.2)',
                            'rgba(115, 152, 252, 0.2)',
                            'rgba(115, 152, 252, 0.2)',
                            'rgba(115, 152, 252, 0.2)',
                            'rgba(115, 152, 252, 0.2)',
                            'rgba(115, 152, 252, 0.2)',
                            'rgba(115, 152, 252, 0.2)',
                            'rgba(115, 152, 252, 0.2)',
                        ],
                        pointBackgroundColor:['rgba(255, 255, 255, 255)'],
                        borderColor: [
                            'rgb(11, 98, 164)',
                            'rgb(11, 98, 164)',
                            'rgb(11, 98, 164)',
                            'rgb(11, 98, 164)',
                            'rgb(11, 98, 164)',
                            'rgb(11, 98, 164)',
                            'rgb(11, 98, 164)',
                            'rgb(11, 98, 164)',
                            'rgb(11, 98, 164)',
                            'rgb(11, 98, 164)',
                            'rgb(11, 98, 164)',
                            'rgb(11, 98, 164)',
                            
                        ],
                        pointBorderColor:'#4b5861',
                        pointBorderWidth:3,
                        borderWidth: 2
                    }
                    ,
                    {
                        label: year2+ ' Consumption',
                        data: kwh_used2,
                        // data: [3, 6, 7, 5, 8, 3, 15, 30, 3, 5, 2, 4],
                        backgroundColor: [
                           'rgba(255, 172, 128, 0.2)',
                           'rgba(255, 172, 128, 0.2)',
                           'rgba(255, 172, 128, 0.2)',
                           'rgba(255, 172, 128, 0.2)',
                           'rgba(255, 172, 128, 0.2)',
                           'rgba(255, 172, 128, 0.2)',
                           'rgba(255, 172, 128, 0.2)',
                           'rgba(255, 172, 128, 0.2)',
                           'rgba(255, 172, 128, 0.2)',
                           'rgba(255, 172, 128, 0.2)',
                           'rgba(255, 172, 128, 0.2)',
                           'rgba(255, 172, 128, 0.2)',
                        ],
                        pointBackgroundColor:['rgba(255, 255, 255, 255)'],
                        borderColor: [
                            'rgba(230, 80, 0, 1)',
                            'rgba(230, 80, 0, 1)',
                            'rgba(230, 80, 0, 1)',
                            'rgba(230, 80, 0, 1)',
                            'rgba(230, 80, 0, 1)',
                            'rgba(230, 80, 0, 1)',
                            'rgba(230, 80, 0, 1)',
                            'rgba(230, 80, 0, 1)',
                            'rgba(230, 80, 0, 1)',
                            'rgba(230, 80, 0, 1)',
                            'rgba(230, 80, 0, 1)',
                            'rgba(230, 80, 0, 1)',
                        ],
                        pointBorderColor:'#4b5861',
                        pointBorderWidth:3,
                        borderWidth: 2
                    }
                    ],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].label || '';

                                if (label) {
                                    label += ': ';
                                }
                                label += Math.round(tooltipItem.yLabel * 100) / 100;
                                return label + ' kwh';
                            }
                        }
                    }
                }
            });
        }
        
</script>
@endsection