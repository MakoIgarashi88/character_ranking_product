import Router from 'vue-router'

export default new Router({
    mode: 'history',
    routes: [
        // トップページ
        { name: 'top', path: '/', component: require('./components/HomeComponent.vue').default },

        // ランキング一覧ページ
        { name: 'ranking.index', path: '/', component: require('./components/HomeComponent.vue').default },

        // ランキング表示ページ
        { name: 'ranking.show', path: '/', component: require('./components/HomeComponent.vue').default },

        // ランキング作成ページ
        { name: 'ranking.create', path: '/', component: require('./components/HomeComponent.vue').default },

        // キャラクター表示ページ
        { name: 'character.index', path: '/', component: require('./components/HomeComponent.vue').default },

        // キャラクター編集ページ
        { name: 'character.edit', path: '/', component: require('./components/HomeComponent.vue').default },

        // キャラクター新規追加ページ
        { name: 'character.create', path: '/', component: require('./components/HomeComponent.vue').default },

        // キャラクター検索ページ
        { name: 'character.search', path: '/', component: require('./components/HomeComponent.vue').default },

        // キャラクターのパラメータ投票ページ
        { name: 'character.vote', path: '/', component: require('./components/HomeComponent.vue').default },
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