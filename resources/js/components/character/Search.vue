<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="12" sm="10" md="8">
                <v-text-field
                v-model="message"
                background-color="white"
                append-outer-icon='mdi-send'
                filled
                clear-icon="mdi-close-circle"
                clearable
                type="text"
                @click:append-outer="sendMessage"
                @click:clear="clearMessage"
                ></v-text-field>
            </v-col>
        </v-row>
        <v-row justify="end">
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
            message: '',
            iconIndex: 0,
            ranking: {
                id:1,
                name: '総合',
                characters: [
                    {
                        id: 1,
                        name: "爆豪勝己",
                        anime_title: "終末なにしてますか？ 忙しいですか？ 救ってもらっていいですか？",
                        image_name: "/storage/images/02.jpeg",
                    },
                    {
                        id: 2,
                        name: "天童",
                        anime_title: "ハイキュー!!",
                        image_name: "/storage/images/02.jpeg",
                    },
                    {
                        id: 3,
                        name: "爆豪勝己",
                        anime_title: "僕のヒーローアカデミア",
                        image_name: "/storage/images/02.jpeg",
                    },
                    {
                        id: 4,
                        name: "天童",
                        anime_title: "ハイキュー!!",
                        image_name: "/storage/images/02.jpeg",
                    },     
                    {
                        id: 1,
                        name: "爆豪勝己",
                        anime_title: "終末なにしてますか？ 忙しいですか？ 救ってもらっていいですか？",
                        image_name: "/storage/images/02.jpeg",
                    },
                    {
                        id: 2,
                        name: "天童",
                        anime_title: "ハイキュー!!",
                        image_name: "/storage/images/02.jpeg",
                    },
                    {
                        id: 3,
                        name: "爆豪勝己",
                        anime_title: "僕のヒーローアカデミア",
                        image_name: "/storage/images/02.jpeg",
                    },
                    {
                        id: 4,
                        name: "天童",
                        anime_title: "ハイキュー!!",
                        image_name: "/storage/images/02.jpeg",
                    },                     
                ],
            },
        }
    },
    methods: {
        sendMessage () {
            this.resetIcon()
            this.clearMessage()
        },
        clearMessage () {
            this.message = ''
        },
        resetIcon () {
            this.iconIndex = 0
        },
    },
}
</script>
<style lang="scss" scoped>
</style>