<template>
    <v-container>
        <v-row justify="center">
            <v-col class="text-center">
                <h1>新着ランキング</h1>
            </v-col>
        </v-row>
        <div v-for="(ranking, index) in rankings" :key="index" class="py-5 my-5">
            <v-row class="justify-center">
                <v-col cols="auto" class="pa-5">
                    <router-link :to="{ path: 'ranking/' + ranking.id }">
                        <h2>{{ ranking.name }}ランキング</h2>
                    </router-link>                   
                </v-col>
            </v-row>
            <v-row justify="center">
                <v-col cols="12" sm="6" md="3" class="text-center mt-4" v-for="(character, index) in ranking.characters" :key="index">
                    <span>{{ character.rank }}位</span>
                    <CharaCard :character="character" :items="ranking.items" chart/>
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