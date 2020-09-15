@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Dashboard</h3>
    </div>
</div>
<div class="row ">
    <div class="col-md-7 col-sm-3 dashboard">   
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
                    <option value="2018" selected>2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015" >2015</option>
                </select>
			</div>
        </div> 
                   
    </div>
    <div class="col-md-3 col-sm-3 dashboard">   
        <div class="panel panel-default">
            <div class="panel-heading">
               Box2
            </div>
            <div class="panel-body">
               This is Box2
            </div>
        </div>                 
    </div>

    <div class="col-md-2 col-sm-2 dashboard">   
        <div class="panel panel-default">
            <div class="panel-heading">
               Box2
            </div>
            <div class="panel-body">
               This is Box2
            </div>
        </div>                 
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
        });

         $.each(consumptions.consumption2, function(i, item) {
            month2[i] = item.cutoff_month;
            kwh_used2[i] = item.kwh_used;
        });
        
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