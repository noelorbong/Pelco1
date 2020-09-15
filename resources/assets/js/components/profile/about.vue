<template>
    <div class="panel panel-default">
        <!-- <div class="panel-heading">
            About
        </div> -->
        <div class="panel-body">
            <Strong>Account No.: </Strong> {{profile.applicant_account_no}}
            <br>
            <br>
            <Strong>Last Name: </Strong>  {{profile.applicant_lastname}}
            <br>
            <br>
            <Strong>First Name: </Strong> {{profile.applicant_firstname}}
            <br>
            <br>
            <Strong>Middle Name: </Strong> {{profile.applicant_middlename}}
            <!-- <Strong>Age: </Strong>  {{calculate_age(profile.dob)}} years old
            <br>
            <br>
            <Strong>Bithday: </Strong>  {{formatBirthdate(profile.dob)}} -->
       
            <br>
            <br>
            <Strong>Spouse/Co-Member: </Strong> 
            <br>
            <br>
            <Strong>Contact No: </Strong> {{profile.applicant_mobile_no}}
            <br>
            <br>
            <Strong>Address: </Strong> {{profile.applicant_address}}
            </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            axios.get('/currentuser')
                .then(function (resp) {
                    app.profile = resp.data;
                    // console.log(resp.data);
                })
                .catch(function () {
                    alert("Could not load your profile")
                });
        },
        data: function () {
            return {
                profile: []
            }
        },
        methods:{
            calculate_age(dob) {
                var start = new Date(dob);
                var birth = start.getFullYear();
                var curr = new Date().getFullYear();
                return curr - birth;
            },
            formatBirthdate(dob) {
                const d = new Date(dob);
               const MONTH_NAMES = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
                ];
                // document.write("The current month is " + monthNames[d.getMonth()]);
                return MONTH_NAMES[d.getMonth()] + " " + d.getDate() +", "+d.getFullYear();
            },

        }
    }
</script>