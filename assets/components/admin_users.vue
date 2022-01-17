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
            ['Id', 'Nom', 'Prénom', 'Email', 'Role', 'Mot de passe'],
            [1, 'Aidoun', 'Nejma', 'guermachenejma@gmail.com', 'ROLE_USER', '$2y$13$8dbMusG7mAuKbP/2Y0l.JOeUIHPoo9U3eTduNvR.CkGryrX/ZWA4y'],
            [2, 'Bouri', 'Mehdi', 'mbouridev@gmail.com', 'ROLE_USER', '$2y$13$8dbMusG7mAuKbP/2Y0l.JOeUIHPoo9U3eTduNvR.CkGryrX/ZWA4y'],
            [3, 'Stuckens', 'Kelian', 'keke@gmail.com', 'ROLE_ADMIN', '$2y$13$8dbMusG7mAuKbP/2Y0l.JOeUIHPoo9U3eTduNvR.CkGryrX/ZWA4y'],
            [4, 'Belaroussi', 'Messine', 'messinebelaroussi@gmail.com', 'ROLE_ADMIN', '$2y$13$8dbMusG7mAuKbP/2Y0l.JOeUIHPoo9U3eTduNvR.CkGryrX/ZWA4y']
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
            column: 1, 
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
    const UserTable = new Vue({
        el: '#tableUser',
        components: {
            table: VueTableDynamic
        } 
    });
</script>