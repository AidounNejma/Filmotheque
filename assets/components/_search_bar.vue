<template>
        <div class="mask d-flex justify-content-center align-items-center searchBar" style="background-color: #003333;height: 70px;">
            <div id="search-autocomplete" class="form-outline">
                <input type="search" id="form1" class="form-control" placeholder="Rechercher" />
            </div>
            <button type="button" class="btn btn-dark searchBtn">
                <i class="fas fa-search"></i>
            </button>
    </div>
</template>


<script>

    import Vue from 'vue'

    export default {
        components: {
            search: Vue
        }
    }

    const searchBar = new Vue({
        el: '#search',
        components: {
            search: Vue 
        } 
    });

</script>