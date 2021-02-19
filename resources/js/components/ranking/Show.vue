<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="11">
                <v-row class="justify-center">
                    <v-col cols="12" class="text-center pa-5">
                        <h2>{{ name }}ランキング</h2>
                    </v-col>
                    <v-col cols="12" class="text-center pa-1">
                        <v-chip v-for="(item, index) in items"
                        :key="index"
                        text-color="white"
                        :color="item.color"
                        class="ma-1">
                        {{ item.label }}
                        </v-chip>
                    </v-col>
                    <v-col cols="12" class="text-center">
                        <p>が高い順でランキングされています</p>
                    </v-col>
                </v-row>
                <v-row v-show="pageLength">
                    <v-col cols="12" class="justify-center">
                        <v-pagination v-model="page" :length="pageLength" circle></v-pagination>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" sm="4" md="3" lg="2" class="text-center mt-4" v-for="(character, index) in characters" :key="index">
                        <span>{{ character.rank }}位</span>
                        <CharaCard :character="character" />
                    </v-col>
                </v-row>
                <v-row v-show="pageLength">
                    <v-col cols="12" class="justify-center">
                        <v-pagination v-model="page" :length="pageLength" circle></v-pagination>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
        <Loading :isLoading="isLoading"/>
    </v-container>
</template>

<script>
export default {
    props: [ 'ranking_id' ],
    data () {
        return {
            name: '',
            page: 1,
            pageLength: 0,
            characters: [],
            items: [],
            isLoading: false,
        }
    },
    mounted () {
        this.getRanking ()
    },
    methods: {
        getRanking () {
            this.isLoading = true
            axios.get('/api/ranking/' + this.ranking_id, {
                params: {
                    page: this.page,
                }
            })
            .then(res => {
                this.name = res.data.ranking.name,
                this.characters = res.data.characters,
                this.items = res.data.items,
                this.pageLength = res.data.pageLength,
                console.log(res.data)
            }).catch(res => {
                alert('キャラクターの取得に失敗しました')
            }).finally(res => {
                this.isLoading = false
            })
        }
    },
    computed: {
        $rank () {
            return 
        }
    },
    watch: {
        page () {
            this.getRanking()
        }
    }
}
</script>
<style lang="scss" scoped>
</style>