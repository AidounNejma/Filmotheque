import './styles/film_show_one.css'

import Vue from 'vue';
import searchBar from './components/_search_bar.vue';

new Vue({ render: h => h(searchBar) }).$mount('#search')