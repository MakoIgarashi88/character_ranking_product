<template>
    <v-container>
        <v-row justify="center">
            <v-col class="text-center">
                <h1>新着ランキング</h1>
            </v-col>
        </v-row>
        <div v-for="(ranking, index) in rankings" :key="index">
            <v-row class="justify-center">
                <v-col cols="12" class="text-center pa-5">
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
        this.getItems ()
    },
    methods: {
        getItems () {
            axios.get('/api/character')
            .then(res => {
                this.rankings = res.data
            }).catch(error => {
                alert(error)
            })
        }
    },
    components: {
    }
}
</script>
<style lang="scss" scoped>
</style>