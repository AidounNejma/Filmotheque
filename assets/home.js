import './styles/home.css';

//Imports Vue
import Vue from 'vue'
import Carousel from './components/carousel.vue'

new Vue({ render: h => h(Carousel) }).$mount('#carousel')