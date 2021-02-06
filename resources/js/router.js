import Router from 'vue-router'

export default new Router({
    mode: 'history',
    routes: [
        // トップページ
        { name: 'top', path: '/', component: require('./components/HomeComponent.vue').default },

        // ランキング一覧ページ
        { name: 'ranking', path: '/ranking', component: require('./components/ranking/Index.vue').default },

        // ランキング表示ページ
        { name: 'ranking.show', path: '/ranking/:ranking_id', component: require('./components/ranking/Show.vue').default, props: true },

        // ランキング作成ページ
        { name: 'ranking.create', path: '/ranking/create', component: require('./components/ranking/Create.vue').default },

        // キャラクター表示ページ
        { name: 'character', path: '/character/:character_id', component: require('./components/character/Show.vue').default, props: true },

        // キャラクター編集ページ
        { name: 'character.edit', path: '/character/edit/:character_id', component: require('./components/character/CreateUpdate.vue').default, props: true },

        // キャラクター新規追加ページ
        { name: 'character.create', path: '/character/create', component: require('./components/character/CreateUpdate.vue').default },

        // キャラクター検索ページ
        { name: 'character.search', path: '/character/search', component: require('./components/character/Search.vue').default },

        // キャラクターのパラメータ投票ページ
        { name: 'character.vote', path: '/character/vote/:character_id', component: require('./components/character/Vote.vue').default, props: true },
    ]
});

/**
 * Navigation guard
 * 
 * If the user is a viewer, redirect to the unauthorized screen
 */
// router.beforeResolve((to, from, next) => {
//     var id = setInterval(function(){
//         // wait until is_viewer is defined
//         if(store.state.user.is_viewer !== undefined){
//             // If the user is a viewer, redirect to the unauthorized screen
//             if (!store.state.user.is_admin) {
//                 if (to.name === 'setting' || to.name.match(/employee*/)) {
//                     // Avoid infinite loop
//                     if (to.name !== 'unauthorized') next('/unauthorized')
//                     else next()
//                 } else {
//                     next()
//                 }
//             } else {
//                 next()
//             }
//             clearInterval(id)
//         }
//     }, 100)     // 0.1 second interval
// })