
<template>
    <div >
        <div class="panel panel-default">
            <div class="panel-heading "><strong>Employees list</strong>
                <span class="pull-right " >
                    <router-link :to="{name: 'createEmployee'}" class="btn btn-success" style="display: inline;" >Create new Employee</router-link>
                </span>
                
                <!-- <div ><br>Employees list
                <span class="pull-right " >
                    <router-link :to="{name: 'createEmployee'}" class="btn btn-success" style="display: inline;" >Create new Employee</router-link>
                </span>
                </div> -->
            </div>
            
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>Location</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="employee, index in employees">
                        <td>{{ employee.firstname }} {{ employee.lastname }}</td>
                        
                        <td>{{ employee.companyname }}</td>
                        <td>{{ employee.address }}</td>
                          <td>
                            <a href="#" class="btn btn-xs btn-success"
                                v-on:click="showmap(employee.latitude, employee.longitude, employee.address)">
                                            View
                            </a>
                             
                        </td>
                        <!-- <td>{{ employee.latitude }}</td>
                        <td>{{ employee.longitude }}</td> -->
                        <td>
                            <table>
                                <tr>
                                    <td style="margin-right:10px;">
                                        <router-link :to="{name: 'editEmployee', params: {id: employee.id}}" class="btn btn-xs btn-default">
                                            Edit
                                        </router-link>
                                    </td>
                                    <td>
                                        <a href="#"
                                        class="btn btn-xs btn-danger"
                                        v-on:click="deleteEntry(employee.id, index)">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div id="map" style="width:100%;height:500px"></div>
        </div>
        
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                employees: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/employees')
                .then(function (resp) {
                    app.employees = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load employees");
                });
           // app.showmap();
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/employees/' + id)
                        .then(function (resp) {
                            app.employees.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete employees");
                        });
                }
            },
            showmap(latitude, longitude, Address) {
                    var myCenter = new google.maps.LatLng(latitude,  longitude);
                    var mapCanvas = document.getElementById("map");
                    var mapOptions = {center: myCenter, zoom: 10};
                    var map = new google.maps.Map(mapCanvas, mapOptions);
                    var marker = new google.maps.Marker({position:myCenter});
                    marker.setMap(map);
                    google.maps.event.addListener(marker,'click',function() {
                        var infowindow = new google.maps.InfoWindow({
                        content:Address
                        });
                    infowindow.open(map,marker);
                    });
            }

        }
    }
</script>
