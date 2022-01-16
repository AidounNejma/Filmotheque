    <template>
        
        <div class="d-flex flex-column dropdownMenu">
        <h5 class="titleDropdown">Filtrer les programmes par :</h5>
        <vue-tree-navigation :items="items"/>
        </div>
    </template>

<script>
    import Vue from 'vue'
    import VueTreeNavigation from 'vue-tree-navigation';
    Vue.use(VueTreeNavigation);

    export default {
    
    data() {
        return {
        items: [
            { name: 'Genre', children: [
                { name: 'Action', href: '#' },
                { name: 'Suspense', href: '#' },
                { name: 'Thriller', href: '#' },
                { name: 'Comédie', href: '#' },
                { name: 'Romantique', href: '#' },
            ]},
            { name: 'Thème', children: [
                { name: 'Enfance', href: '#' },
                { name: 'Tranche de vie', href: '#' },
                { name: 'Deuil', href: '#' },
                { name: 'Amour de jeunesse', href: '#' },
                { name: 'Extraterrestre', href: '#' },
            ]},
            { name: 'Année', children: [
                { name: '2001', href: '#' },
                { name: '2002', href: '#' },
                { name: '2003', href: '#' },
                { name: '2004', href: '#' },
                { name: '2005', href: '#' },
            ]},
            { name: 'Pays', children: [
                { name: 'France', href: '#' },
                { name: 'Etats-Unis', href: '#' },
                { name: 'Corée', href: '#' },
                { name: 'Japon', href: '#' },
                { name: 'Espagnol', href: '#' },
            ]},
            { name: 'Acteurs', children: [
                { name: '2001', href: '#' },
                { name: '2002', href: '#' },
                { name: '2003', href: '#' },
                { name: '2004', href: '#' },
                { name: '2005', href: '#' },
            ]},
            { name: 'Langue', children: [
                { name: 'Français', href: '#' },
                { name: 'Anglais', href: '#' },
                { name: 'Espagnol', href: '#' },
                { name: 'Portugais', href: '#' },
                { name: 'Arabe', href: '#' },
            ]},
            { name: 'Sous-titrés', children: [
                { name: 'Français', href: '#' },
                { name: 'Anglais', href: '#' },
                { name: 'Espagnol', href: '#' },
                { name: 'Portugais', href: '#' },
                { name: 'Arabe', href: '#' },
            ]},
            { name: 'Accessiblité', children: [
                { name: 'Sourd', href: '#' },
                { name: 'Aveugle', href: '#' },
                { name: 'Muet', href: '#' }
            ]}
        ],
        defaultOpenLevel: 1
        }
    }

};
    const dropdown = new Vue({
        el: '#dropdown',
        components: {
            treeNavigation: VueTreeNavigation
        } 
    });
</script>