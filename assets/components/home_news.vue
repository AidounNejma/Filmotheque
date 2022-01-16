    <template>
        <div class="news p-4">
            <h3 class="text-center text-white pb-4"> Nouveautés</h3>
            <div class="d-flex">
                <div class="firstDiv mx-4">
                    <a href="" class="p-2 imgOne"><img alt="" src="/img/home/pulpfiction.png"></a>
                </div>
                <div class="d-flex flex-wrap px-4 px-4 secondPart">
                    <a href="" class="p-2 imgEight"><img alt="" src="/img/home/avatar.png"></a>
                    <a href="" class="p-2 imgEight"><img alt="" src="/img/home/inception.png"></a>
                    <a href="" class="p-2 imgEight"><img src="/img/home/joker.png" alt=""/></a>
                    <a href="" class="p-2 imgEight"><img src="/img/home/le_discours_dun_roi_affiche.png" alt=""/></a>
                    <a href="" class="p-2 imgEight"><img src="/img/home/toystory.png" alt=""/></a>
                    <a href="" class="p-2 imgEight"><img src="/img/home/thepaintedveil.png" alt="" /></a>
                    <a href="" class="p-2 imgEight"><img src="/img/home/matrix.png" alt=""/></a>
                    <a href="" class="p-2 imgEight"><img src="/img/home/Le_Temoin_du_mal.png" alt="" /></a>
                </div>
            </div>
        </div>
    </template>

<script>

    import Vue from 'vue'

    export default {
        components: {
            news: Vue
        }
    }

    const News = new Vue({
        el: '#news',
        components: {
            news: Vue 
        } 
    });

</script>