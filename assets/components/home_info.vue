    <template>
            <div class="d-flex justify-content-between">
                <div class="flex-md-column p-4 m-4 text-center">
                    <img class="pb-4" src="/img/home/info1.png">
                    <p>Découvrez le Service de <strong>Vidéo à la demande</strong> de Filmothèque !</p>
                    <a href="" class="linksInfo">Voir les fonctionnalités</a>
                </div>
                <div class="flex-md-column p-4 m-4 text-center">
                    <img class="pb-4" src="/img/home/info2.png">
                    <p>Découvrez les listes <strong>des films pour enfants</strong></p>
                    <a href="" class="linksInfo">Voir la liste</a>
                </div>
                <div class="flex-md-column p-4 m-4 text-center">
                    <img class="pb-4" src="/img/home/info3.png">
                    <p><strong>Téléchargez vos films</strong> sur ordinateur en installant notre nouveau lecteur vidéo</p>
                    <a href="" class="linksInfo">Installer l'application</a>
                </div>
            </div>
    </template>

<script>

    import Vue from 'vue'

    export default {
        components: {
            info: Vue
        }
    }

    const Info = new Vue({
        el: '#info',
        components: {
            info: Vue 
        } 
    });

</script>