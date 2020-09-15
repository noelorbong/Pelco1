
<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Create Location
                <span class="pull-right">
                    <router-link to="/" class="btn btn-default" style="display: inline;" >Back</router-link>
                </span>
            </div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">      
                     <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Latitude</label>
                            <input type="text" v-model="employee.latitude" class="form-control">
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Longitude</label>
                            <input type="text" v-model="employee.longitude" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
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
                    app.location.user_id = resp.data.id;
                    console.log( app.location.user_id);
                })
                .catch(function () {
                    alert("Could not load your profile")
                });
        },
        data: function () {
            return {
                location: {
                    user_id:'',
                    latitude: '',
                    longitude: '',
                }
            }
        },
        methods: {
            saveForm() {
                // event.preventDefault();
                var app = this;
                var newlocation = app.location;
                axios.post('/api/v1/location/create', location)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your employee");
                    });
            }
        }
    }
</script>
