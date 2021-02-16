<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="11">
                <v-row class="justify-center">
                    <v-col cols="12" class="text-center pa-5">
                        <h2>{{ name }}ランキング</h2>
                    </v-col>
                    <v-col cols="auto" class="text-center pa-1" v-for="(item, index) in items" :key="index">
                        <span>{{ item.label }}</span>
                    </v-col>
                    <p>が高い順でランキングされています</p>
                </v-row>
                <v-row>
                    <v-col cols="12" sm="4" md="3" lg="2" class="text-center mt-4" v-for="(character, index) in characters" :key="index">
                        <span>{{ character.rank }}位</span>
                        <CharaCard :character="character" />
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    props: [ 'ranking_id' ],
    data () {
        return {
            name: '',
            characters: [],
            items: [],
        }
    },
    mounted () {
        this.getRanking ()
    },
    methods: {
        getRanking () {
            axios.get('/api/ranking/' + this.ranking_id)
            .then(res => {
                this.name = res.data.ranking.name,
                this.characters = res.data.characters,
                this.items = res.data.items,
                console.log(res.data)
            }).catch(res => {
                alert('コメントの取得に失敗しました')
            })
        }
    },
    computed: {
        $rank () {
            return 
        }
    }
}
</script>
<style lang="scss" scoped>
</style>