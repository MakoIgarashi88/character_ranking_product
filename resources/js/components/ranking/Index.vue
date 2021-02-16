<template>
    <v-container>
        <v-row class="justify-center">
            <v-col cols="12" class="text-center pa-5">
                <h2>ランキング一覧</h2>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="auto" v-for="(ranking, index) in rankings" :key="index">
                <router-link :to="{ name: 'ranking.show', params: { 'ranking_id': ranking.id } }">
                    <h3>{{ranking.name}}ランキング</h3>
                </router-link>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data () {
        return {
            rankings: [],
        }
    },
    mounted () {
        this.getRankings()
    },
    methods: {
        getRankings () {
            axios.get('/api/ranking/list')
            .then(res => {
                this.rankings = res.data
            }).catch(res => {
                alert('一覧の取得に失敗しました')
            })
        }
    }
}
</script>
<style lang="scss" scoped>
</style>