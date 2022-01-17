<template>
    <div style="width: 100%">
        <vue-table-dynamic 
        :params="params"
        @cell-change="onCellChange"
        ref="table">
    </vue-table-dynamic>
    </div>
</template>

<script>
    import Vue from 'vue';
    import VueTableDynamic from 'vue-table-dynamic';

export default {
    name: 'Demo',
    data() {
        return {
        params: {
            data: [
            ['Id', 'Titre', 'Résumé', 'Acteurs', 'Affiche', 'Genre', 'Pays', 'Durée', 'Réalisé en', 'Date d\'ajout', 'Mise à jour'],
            [1, 'Avatar', 'Des hommes bleus', 'James Cameron', 'photoAvatar.png', 'Fantastique', 'U.S.A', '120', '20-03-2007', '16-01-2022', '17-01-2022'],
            [2, 'Titanic', 'Des hommes bleus', 'James Cameron', 'photoAvatar.png', 'Fantastique', 'U.S.A', '120', '01-01-199', '16-01-2022', '17-01-2022'],
            [3, 'Vieux film', 'Des hommes bleus', 'James Cameron', 'photoAvatar.png', 'Fantastique', 'U.S.A', '120', '07-05-1960', '16-01-2022', '17-01-2022']
            ],
            header: 'row',
            border: true,
            stripe: true,
            pagination: true,
            pageSize: 5,
            pageSizes: [5, 10, 20, 50],
            enableSearch: true,
            showCheck: true,
            filter: [{
            column: 0, 
            content: [{text: '> 2', value: 2}, {text: '> 4', value: 4}], 
            method: (value, tableCell) => { return tableCell.data > value }
            }, {
            column: 8, 
            content: [{text: '2019-01-01', value: '2019-01-01'}, {text: '2019-02-02', value: '2019-02-02'}], 
            method: (value, tableCell) => { return String(tableCell.data).toLocaleLowerCase().includes(String(value).toLocaleLowerCase()) }
            }],
        }
        }
    },
    methods: {
        onCellChange (rowIndex, columnIndex, data) {
        console.log('onCellChange: ', rowIndex, columnIndex, data)
        console.log('table data: ', this.$refs.table.getData())
        }
    },
    components: { VueTableDynamic }
}
    const FilmTable = new Vue({
        el: '#tableFilm',
        components: {
            table: VueTableDynamic
        } 
    });
</script>