
    <template>
        <agile fade :autoplay-speed="5000" :speed="2500" pause-on-hover pause-on-dots-hover autoplay>
            <div class="slide">
                <img class="imgCarousel" src="https://cdn.radiofrance.fr/s3/cruiser-production/2021/11/0a2170b8-fe0a-4780-b59f-4031247ecb09/1200x680_076-chl-005876.jpg"/>
                <div class="textCarousel">
                    <h3 class="titleCarousel">Titre 1</h3>
                    <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <a href="#" class="linkCarousel">En savoir plus</a>
            </div>

        <div class="slide">
            <img class="imgCarousel" src="https://www.lesinrocks.com/wp-content/uploads/2017/11/19226838-jpg-r_1920_1080-f_jpg-q_x-xxyxx.jpg?fit=2000%2C1000&quality=75"/>
            <div class="textCarousel">
                <h3 class="titleCarousel">Titre 2</h3>
                <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <a href="#" class="linkCarousel">En savoir plus</a>
        </div>

        <div class="slide">
            <img class="imgCarousel" src="https://i.pinimg.com/originals/53/52/72/535272c7a09978fe9878d11fe66ee642.jpg"/>
            <div class="textCarousel">
                <h3 class="titleCarousel">Titre 3</h3>
                <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <a href="#" class="linkCarousel">En savoir plus</a>
        </div>

        <div class="slide">
            <img class="imgCarousel" src="https://static.hitek.fr/img/actualite/ill_m/70994507/jokerjoaquinphoenix.jpg"/>
            <div class="textCarousel">
                <h3 class="titleCarousel">Titre 4</h3>
                <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <a href="#" class="linkCarousel">En savoir plus</a>
        </div>
        
        <div class="slide">
            <img class="imgCarousel" src="https://i0.wp.com/www.superpouvoir.com/wp-content/uploads/2021/12/matrix-resurrections-post-generique-post-credit-scene.jpg?resize=1200%2C600&ssl=1"/>
            <div class="textCarousel">
                <h3 class="titleCarousel">Titre 5</h3>
                <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <a href="#" class="linkCarousel">En savoir plus</a>
        </div>

        <div class="slide">
            <img class="imgCarousel" src="https://images-3.wuaki.tv/system/shots/195002/original/snapshot-1590664213.jpeg"/>
            <div class="textCarousel">
                <h3 class="titleCarousel">Titre 6</h3>
                <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <a href="#" class="linkCarousel">En savoir plus</a>
        </div>

        <div class="slide">
            <img class="imgCarousel" src="https://i.ytimg.com/vi/-tOC5yVO4ok/maxresdefault.jpg"/>
            <div class="textCarousel">
                <h3 class="titleCarousel">Titre 7</h3>
                <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <a href="#" class="linkCarousel">En savoir plus</a>
        </div>
        
        <template slot="prevButton"><i class="fas fa-chevron-left"></i></template>
        <template slot="nextButton"><i class="fas fa-chevron-right"></i></template>
        </agile>
    </template>

<script>

    import Vue from 'vue'
    import { VueAgile } from 'vue-agile'

    export default {
        components: {
            agile: VueAgile
        }
    }

    const Carousel = new Vue({
        el: '#carousel',
        components: {
            agile: VueAgile 
        }
    });

</script>