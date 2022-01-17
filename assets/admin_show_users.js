import './styles/admin_show_users.css';

//Imports Vue
import Vue from 'vue';
import UserTable from './components/admin_users.vue';

new Vue({ render: h => h(UserTable) }).$mount('#tableUser')
