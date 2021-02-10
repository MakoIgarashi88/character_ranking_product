<template>
    <v-container>
        <v-row class="justify-center">
            <v-col cols="12" class="text-center pa-5">
                <h2>ランキング一覧</h2>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="10" v-for="(ranking, index) in rankings" :key="index">
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
            rankings: [
                {
                    id:1,
                    name: '総合',
                },
                {
                    id:1,
                    name: 'かっこいい',
                },
                {
                    id:1,
                    name: 'かわいい',
                },
            ]
        }
    },
    components: {
    }
}
</script>
<style lang="scss" scoped>
</style>