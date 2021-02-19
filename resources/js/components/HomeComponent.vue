<template>
    <v-container>
        <v-row justify="center">
            <v-col class="text-center">
                <h1>新着ランキング</h1>
            </v-col>
        </v-row>
        <div v-for="(ranking, index) in rankings" :key="index">
            <v-row class="justify-center">
                <v-col cols="auto" class="pa-5">
                    <router-link :to="{ path: 'ranking/' + ranking.id }">
                        <h2>{{ ranking.name }}ランキング</h2>
                    </router-link>                   
                </v-col>
            </v-row>
            <v-row justify="center">
                <v-col cols="10" sm="3" lg="2" v-for="(character, index) in ranking.characters" :key="index">
                    <CharaCard :character="character" />
                </v-col>
            </v-row>
        </div>
        <Loading :isLoading="isLoading"/>
    </v-container>
</template>

<script>
export default {
    data () {
        return {
            rankings: [],
            isLoading: false,
        }
    },
    mounted () {
        this.getItems ()
    },
    methods: {
        getItems () {
            this.isLoading = true
            axios.get('/api/ranking')
            .then(res => {
                this.rankings = res.data
            }).catch(error => {
                alert(error)
            }).finally(res => {
                this.isLoading = false
            })
        }
    },
}
</script>
<style lang="scss" scoped>
</style>