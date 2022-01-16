import './styles/home.css';

//Imports Vue
import Vue from 'vue'
import Carousel from './components/home_carousel.vue'
import Info from './components/home_info.vue'
import News from './components/home_news.vue'

new Vue({ render: h => h(Carousel) }).$mount('#carousel')
new Vue({ render: h => h(Info) }).$mount('#info')
new Vue({ render: h => h(News) }).$mount('#news')
