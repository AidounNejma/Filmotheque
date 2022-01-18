<template>
    <section class="d-flex flex-column">
        <h3 class="text-center pt-2"> Le Catalogue</h3>
        <div class="d-flex justify-content-center align-items-center">
            <button href="#" class="px-4 pt-2 pb-4 linksCatalogue">Programmes (1676)</button>
            <button href="#" class="px-4 pt-2 pb-4 linksCatalogue">Les réalisateurs</button>
            <button href="#" class="px-4 pt-2 pb-4 linksCatalogue">Les acteurs</button>
        </div>
    </section>
</template>

<script>

    import Vue from 'vue'

    export default {
        components: {
            thirdNav: Vue
        }
    }

    const catalogueNav = new Vue({
        el: '#catalogueNav',
        components: {
            thirdNav: Vue 
        } 
    });

</script>