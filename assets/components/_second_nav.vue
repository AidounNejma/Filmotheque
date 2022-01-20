<template>
    <div class="mask d-flex justify-content-around align-items-center position-absolute start-0 end-0 secondNav">
        <a href="#" class="text-white nav-link secondNavLinks">NOUVEAUTÉS</a>
        <a href="#" class="text-white nav-link secondNavLinks">TOP</a>
        <a href="#" class="text-white nav-link secondNavLinks">SÉLECTIONS</a>
        <a href="#" class="text-white nav-link secondNavLinks">GENRE</a>
        <a href="" class="text-white nav-link secondNavLinks">CATALOGUE</a>
    </div>
</template>


<script>

    import Vue from 'vue'

    export default {
        components: {
            navTwo: Vue
        }
    }

    const secondNav = new Vue({
        el: '#secondNav',
        components: {
            navTwo: Vue 
        } 
    });

</script>