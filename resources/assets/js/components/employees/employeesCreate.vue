
<template>
    <div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new Employee
                <span class="pull-right">
                    <router-link to="/" class="btn btn-default" style="display: inline;" >Back</router-link>
                </span>
            </div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">First Name</label>
                            <input type="text" v-model="employee.firstname" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" v-model="employee.lastname" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Company Name</label>
                            <input type="text" v-model="employee.companyname" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Address</label>
                            <input type="text" v-model="employee.address" class="form-control">
                        </div>
                    </div>
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
        data: function () {
            return {
                employee: {
                    firstname: '',
                    lastname: '',
                    companyname: '',
                    address: '',
                    latitude: '',
                    longitude: '',
                }
            }
        },
        methods: {
            saveForm() {
                // event.preventDefault();
                var app = this;
                var newEmployee = app.employee;
                axios.post('/api/v1/employees', newEmployee)
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
