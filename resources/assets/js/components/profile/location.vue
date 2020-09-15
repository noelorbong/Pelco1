<template>
    <div class="panel panel-default">
         <div class="panel-heading">
             <i class="fa fa-map-marker fa-fw"></i> Current Location
        </div>
        <div class="panel-body">
           <div  v-for="loc, index in location" >
               <div v-if="loc.latitude">
                   <!-- {{ showmap(loc.latitude, loc.longitude, 'test')}} -->
                  <div id="map" style="width:100%;height:60vh"></div>
               </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            axios.get('/currentuser')
                .then(function (resp) {
                    app.user_id = resp.data.id;
                    console.log(app.user_id);
                    app.checkLocation(app.user_id);
                })
                .catch(function () {
                    alert("Could not load current user")
                });
        },
        data: function () {
            return {
                location: [],
                user_id:'',
                latitude:'',
                longitude:'',
                address:'',
            }
        },
        methods:{
            checkLocation(userid) {
                let app = this;
                axios.get('/api/v1/location/5')
                .then(function (resp) {
                    app.location = resp.data;
                    // app.showmap(resp.data[0].latitude, resp.data[0].longitude, "test");
                    app.longitude =resp.data[0].longitude;
                    app.latitude = resp.data[0].latitude;
                    app.address = resp.data[0].address;
                    console.log(resp.data[0].latitude);
                    app.delayMapShow();
                })
                .catch(function () {
                    alert("Could not load your location");
                });
                
            },
            delayMapShow() {
                let app = this;
                setTimeout(
                    function() {
                        app.showmap();
                    }, 1000);
            },
            showmap() {
                    let app = this;
                    var myCenter = new google.maps.LatLng(app.latitude, app.longitude);
                    var mapCanvas = document.getElementById("map");
                    var mapOptions = {center: myCenter, zoom: 10};
                    var map = new google.maps.Map(mapCanvas, mapOptions);
                    var marker = new google.maps.Marker({position:myCenter});
                    marker.setMap(map);
                    google.maps.event.addListener(marker,'click',function() {
                        var infowindow = new google.maps.InfoWindow({
                        content:app.address
                        });
                    infowindow.open(map,marker);
                    });
            },

        }
    }
</script>