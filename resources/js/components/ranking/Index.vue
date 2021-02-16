<template>
    <v-container>
        <v-row class="justify-center">
            <v-col cols="12" class="text-center pa-5">
                <h2>ランキング一覧</h2>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="12" sm="10" md="8">
                <v-text-field
                v-model="word"
                background-color="white"
                append-outer-icon='mdi-send'
                filled
                clear-icon="mdi-close-circle"
                clearable
                type="text"
                @click:append-outer="onSearch"
                @click:clear="clearMessage"
                ></v-text-field>
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
            word: "",
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
        },
        onSearch () {
            axios.post('/api/ranking/search', {
                word: this.word
            }).then(res => {
                console.log(res.data)
                this.rankings = res.data
            }).catch(error => {
                alert(error)
            })
        },
        clearMessage () {
            this.word = ''
            this.getRankings ()
        },
    }
}
</script>
<style lang="scss" scoped>
</style>