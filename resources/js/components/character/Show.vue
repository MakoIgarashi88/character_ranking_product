<template>                    
    <v-container>
        <v-row justify="center">
            <v-col cols="11" sm="10" md="8" lg="6">
                <v-card>
                    <!--キャラクター画像-->
                    <v-row>
                        <v-col>
                            <IconLg :src="character.image_name" class="text-center my-5"/>
                        </v-col>
                    </v-row>
            
                    <v-divider class="pb-3"/>
            
                    <!--キャラクター紹介-->
                    <v-row justify="center">
                        <v-col cols="10" class="text-center pb-0">
                            <h1>{{ character.name }}</h1>
                        </v-col>
                        <v-col cols="10" class="text-center pt-1">
                            <h3>作品名：{{ character.anime_title }}</h3>
                        </v-col>
                    </v-row>
                    <v-row justify="center" v-for="(item, index) in items" :key="index">
                        <v-col cols="4" class="text-right pa-1" >
                            <span class="mb-1">{{ item.text }}</span>
                        </v-col>
                        <v-col cols="1" class="text-center pa-1" >
                            <span class="mb-1">：</span>
                        </v-col>
                        <v-col cols="4" class="text-left pa-1" >
                            <span class="mb-1">{{ item.name }}</span>
                        </v-col>
                    </v-row>
                    <v-row justify="center">
                        <v-col cols="10">
                            <v-card outlined>
                                <v-card-title>
                                    詳細
                                </v-card-title>
                                <v-card-subtitle>
                                    {{ character.detail }}
                                </v-card-subtitle>
                            </v-card>
                        </v-col>
                    </v-row>

                    <!--パラメータ-->
                    
                    <v-row justify="center">
                        <v-col cols="10">
                            <CharaComment :character_id="character.id"/>
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    props: [ "character_id" ],
    data() {
        return {
            character: {
                id: 1,
                name: "爆豪勝己",
                anime_title: "僕のヒーローアカデミア",
                image_name: "/storage/images/02.jpeg",
                character_voice: '岡本信彦',
                gender: 'female',
                birthday: '4月20日',
                age: '16',
                bloodtype: 'A',
                height: '172',
                weight: '不明',
                detail: '雄英高校ヒーロー科。薄い金髪に赤目の三白眼が特徴的な少年。主人公である緑谷出久とは幼馴染みで彼からの呼称は「かっちゃん」。将来の夢は本人曰く、「オールマイトをも超えるトップヒーローとなり、高額納税者ランキングに名を刻むこと」完璧主義者。',
            },
            items: [],
        }
    },
    mounted () {
        this.items = [
            { text: 'CV', name: this.character.character_voice },
            { text: '性別', name: this.character.gender },
            { text: '誕生日', name: this.character.birthday },
            { text: '年齢', name: this.character.age },
            { text: '血液型', name: this.character.bloodtype },
            { text: '身長', name: this.character.height },
            { text: '体重', name: this.character.weight },
        ]
    }
}
</script>

