import './styles/home.css';

//Imports Vue
import Vue from 'vue'
import Carousel from './components/home_carousel.vue'
import Info from './components/home_info.vue'

new Vue({ render: h => h(Carousel) }).$mount('#carousel')
new Vue({ render: h => h(Info) }).$mount('#info')