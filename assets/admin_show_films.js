import './styles/admin_show_films.css';

//Imports Vue
import Vue from 'vue';
import FilmTable from './components/admin_films.vue';

new Vue({ render: h => h(FilmTable) }).$mount('#tableFilm')
