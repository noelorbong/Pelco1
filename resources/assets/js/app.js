
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
 
window.Vue = require('vue');
import VueRouter from 'vue-router';
 
window.Vue.use(VueRouter);
 
import EmployeesIndex from './components/employees/employeesIndex.vue';
import EmployeesCreate from './components/employees/employeesCreate.vue';
import EmployeesEdit from './components/employees/employeesEdit.vue';
import ProfileAbout from './components/profile/about.vue';
import ProfileLocation from './components/profile/location.vue';
import ProfileElectric from './components/profile/electric.vue';
 
const routes = [
    {
        path: '/',
        components: {
            employeesIndex: EmployeesIndex,
            profileAbout: ProfileAbout,
            profileElectric: ProfileElectric,
            profileLocation: ProfileLocation
        }
    },
    {path: '/pages/create', component: EmployeesCreate, name: 'createEmployee'},
    {path: '/pages/edit/:id', component: EmployeesEdit, name: 'editEmployee'},
    {path: '/', component: ProfileAbout, name: 'profileAbout'},
    {path: '/location', component: ProfileLocation, name: 'profileLocation'},
    {path: '/electric', component: ProfileElectric, name: 'profileElectric'},
]
 
const router = new VueRouter({ routes })
 
const app = new Vue({ router }).$mount('#app')
