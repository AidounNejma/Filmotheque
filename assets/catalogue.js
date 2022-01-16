import './styles/catalogue.css';


//Imports Vue
import Vue from 'vue';
import searchBar from './components/_search_bar.vue';
import catalogueNav from './components/catalogue_nav.vue';
import dropdown from './components/catalogue_dropdown.vue';

new Vue({ render: h => h(searchBar) }).$mount('#search')
new Vue({ render: h => h(catalogueNav) }).$mount('#catalogueNav')
new Vue({ render: h => h(dropdown) }).$mount('#dropdown')