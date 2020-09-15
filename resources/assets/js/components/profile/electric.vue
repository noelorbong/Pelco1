<template>
    <div class="panel panel-default">
        <div class="panel-heading">
           <i class="fa fa-bar-chart-o fa-fw"></i> Electrical Consumption
        </div>
        <div class="panel-body">
           <canvas id="myChart" width="100%" height="50vh"></canvas>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
           var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"],
                    datasets: [{
                        label: '2018 Consumption',
                        data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(115, 152, 252, 0.93)'
                        ],
                        pointBackgroundColor:['rgba(255, 255, 255, 255)'],
                        borderColor: [
                            'rgb(11, 98, 164)'
                        ],
                        pointBorderColor:'#4b5861',
                        pointBorderWidth:3,
                        borderWidth: 2
                    },
                    {
                        label: '2017 Consumption',
                        data: [3, 6, 7, 5, 8, 3, 15, 30, 3, 5, 2, 4],
                        backgroundColor: [
                           'rgba(255, 172, 128, 0.96)'
                        ],
                        pointBackgroundColor:['rgba(255, 255, 255, 255)'],
                        borderColor: [
                            'rgba(230, 80, 0, 1)'
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
                    }
                }
            });
        },
        data: function () {
            return {
                location: [],
                user_id:'',
                latitude:'',
                longitude:''
            }
        },
        methods:{
            checkLocation(userid) {
                let app = this;
                axios.get('/api/v1/location/'+userid)
                .then(function (resp) {
                    app.location = resp.data;
                    // app.showmap(resp.data[0].latitude, resp.data[0].longitude, "test");
                    app.longitude =resp.data[0].longitude;
                    app.latitude = resp.data[0].latitude;
                    console.log(resp.data[0].latitude);
                    app.delayMapShow();
                })
                .catch(function () {
                    alert("Could not load your location");
                });
                
            },
        }
    }
</script>