<template>
    <v-container>
        <div v-for="(ranking, index) in rankings" :key="index">
            <v-row class="justify-center">
                <v-col cols="12" class="text-center pa-5" >
                    <h2>{{ ranking.name }}ランキング</h2>
                </v-col>
            </v-row>
            <v-row justify="center">
                <v-col cols="10" sm="3" lg="2" v-for="(character, index) in ranking.characters" :key="index">
                    <CharaCard :character="character" />
                </v-col>
            </v-row>
            <v-row justify="center">
                <v-col class="text-center">
                    <router-link :to="{ name: 'ranking.show', params: { 'ranking_id': ranking.id } }">
                        もっと見る▼
                    </router-link>
                </v-col>
            </v-row>
        </div>
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
                    ],
                },
                {
                    id: 2,
                    name: 'かわいい',
                    characters: [
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
                {
                    id: 3,
                    name: 'かっこいい',
                    characters: [
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
            ]
        }
    },
    components: {
    }
}
</script>
<style lang="scss" scoped>
</style>