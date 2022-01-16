    <template>
        <div class="news p-4">
            <h3 class="text-center text-white pb-4"> Nouveautés</h3>
            <div class="d-flex">

                <a href="#" class="leftDiv mx-4">
                    <div class="imgOne">
                        <img alt="" src="/img/home/pulpfiction.png">
                        <div class="align">
                            <h2>Pulp Fiction</h2>
                            <p>Cliquez pour découvrir le film</p>
                        </div>
                    </div>
                </a>

                <div class="d-flex flex-wrap px-4 secondDiv">

                        <a href="" class="rightDivs">
                            <div class="imgEight">
                                <img alt="" src="/img/home/avatar.png">
                                <div class="align">
                                    <h2>Avatar</h2>
                                    <p>Cliquez pour découvrir le film</p>
                                </div>
                            </div>
                        </a>

                        <a href="" class="rightDivs">
                            <div class="imgEight">
                                <img alt="" src="/img/home/avatar.png">
                                <div class="align">
                                    <h2>Avatar</h2>
                                    <p>Cliquez pour découvrir le film</p>
                                </div>
                            </div>
                        </a>

                        <a href="" class="rightDivs">
                            <div class="imgEight">
                                <img alt="" src="/img/home/joker.png">
                                <div class="align">
                                    <h2>Joker</h2>
                                    <p>Cliquez pour découvrir le film</p>
                                </div>
                            </div>
                        </a>

                        <a href="" class="rightDivs">
                            <div class="imgEight">
                                <img alt="" src="/img/home/le_discours_dun_roi_affiche.png">
                                <div class="align">
                                    <h2>Le discours d'un roi</h2>
                                    <p>Cliquez pour découvrir le film</p>
                                </div>
                            </div>
                        </a>

                        <a href="" class="rightDivs">
                            <div class="imgEight">
                                <img alt="" src="/img/home/toystory.png">
                                <div class="align">
                                    <h2>Toy Story</h2>
                                    <p>Cliquez pour découvrir le film</p>
                                </div>
                            </div>
                        </a>

                        <a href="" class="rightDivs">
                            <div class="imgEight">
                                <img alt="" src="/img/home/thepaintedveil.png">
                                <div class="align">
                                    <h2>Le voile des illusions</h2>
                                    <p>Cliquez pour découvrir le film</p>
                                </div>
                            </div>
                        </a>

                        <a href="" class="rightDivs">
                            <div class="imgEight">
                                <img alt="" src="/img/home/matrix.png">
                                <div class="align">
                                    <h2>Matrix Résurrection</h2>
                                    <p>Cliquez pour découvrir le film</p>
                                </div>
                            </div>
                        </a>

                        <a href="" class="rightDivs">
                            <div class="imgEight">
                                <img alt="" src="/img/home/Le_Temoin_du_mal.png">
                                <div class="align">
                                    <h2>Le témoin du mal</h2>
                                    <p>Cliquez pour découvrir le film</p>
                                </div>
                            </div>
                        </a>

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