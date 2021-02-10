<template>
    <v-container>
        <v-row justify="end">
            <v-col cols="auto">
                <ToRankingButton />
            </v-col>
        </v-row>
        <v-row class="justify-center">
            <v-col cols="12" class="text-center pa-5">
                <h2>{{ ranking.name }}ランキング</h2>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="10" sm="3" lg="2" v-for="(character, index) in ranking.characters" :key="index">
                <CharaCard :character="character" />
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    props: [ 'runking_id' ],
    data () {
        return {
            ranking: {
                id:1,
                name: '総合',
                characters: [
                    {
                        name: "爆豪勝己",
                        anime_title: "終末なにしてますか？ 忙しいですか？ 救ってもらっていいですか？",
                        image_name: "/storage/images/01.png",
                    },
                    {
                        name: "天童",
                        anime_title: "ハイキュー!!",
                        image_name: "/storage/images/01.png",
                    },
                    {
                        name: "爆豪勝己",
                        anime_title: "僕のヒーローアカデミア",
                        image_name: "/storage/images/01.png",
                    },
                    {
                        name: "天童",
                        anime_title: "ハイキュー!!",
                        image_name: "/storage/images/01.png",
                    },                
                    {
                        name: "爆豪勝己",
                        anime_title: "終末なにしてますか？ 忙しいですか？ 救ってもらっていいですか？",
                        image_name: "/storage/images/01.png",
                    },
                    {
                        name: "天童",
                        anime_title: "ハイキュー!!",
                        image_name: "/storage/images/01.png",
                    },
                    {
                        name: "爆豪勝己",
                        anime_title: "僕のヒーローアカデミア",
                        image_name: "/storage/images/01.png",
                    },
                    {
                        name: "天童",
                        anime_title: "ハイキュー!!",
                        image_name: "/storage/images/01.png",
                    },                
                ],
            },
        }
    },
    components: {
    }
}
</script>
<style lang="scss" scoped>
</style>