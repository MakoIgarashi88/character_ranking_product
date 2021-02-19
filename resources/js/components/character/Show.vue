<template>                    
    <v-container>
        <v-row justify="center">
            <v-col cols="11" sm="10" md="8" lg="6">
                <v-card>
                    <v-row justify="center">
                        <v-col cols="11" class="text-end">
                            <v-btn color="primary" :to="'/character/vote/' +  character.id">投票</v-btn>
                            <v-btn color="primary" :to="'/character/edit/' +  character.id">編集</v-btn>
                        </v-col>
                    </v-row>
                    <!--キャラクター画像-->
                    <v-row justify="center">
                        <v-col cols="auto" class="text-center">
                            <IconLg :src="character.image_name" class="my-5"/>
                        </v-col>
                    </v-row>
            
                    <v-divider class="pb-3"/>
            
                    <v-row justify="center">
                        <v-col cols="10">
                            <!--キャラクター紹介-->
                            <v-row justify="center">
                                <v-col class="text-center pb-0">
                                    <h1>{{ character.name }}</h1>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col class="text-center pt-1">
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

                            <!--パラメータ-->
                            <v-row justify="center">
                                <v-col class="text-center">
                                    <h3>パラメーター</h3>
                                </v-col>
                            </v-row>
                            <v-simple-table>
                                <template v-slot:default>
                                    <tbody>
                                        <tr
                                        v-for="item in parameters"
                                        :key="item.label"
                                        >
                                            <td>{{ item.label }}</td>
                                            <td>
                                                <v-rating
                                                color="primary"
                                                background-color="grey"
                                                empty-icon="mdi-star-outline"
                                                full-icon="mdi-star"
                                                hover
                                                length="5"
                                                :value="item.value"
                                                readonly
                                                ></v-rating>
                                            </td>
                                        </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>

                            <v-row justify="center">
                                <v-col>
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
                            <!--コメント表示--> 
                            <v-row justify="center">
                                <v-col>
                                    <CharaComment :character_id="character_id"/>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>
        </v-row>
        <Loading :isLoading="isLoading"/>
    </v-container>
</template>

<script>
export default {
    props: [ "character_id" ],
    data() {
        return {
            character: {},
            rating: 1,
            items: [],
            comments: [],
            parameters: [],
            isLoading: false,
        }
    },
    mounted () {
        this.getCharacter ()
    },
    methods: {
        getCharacter () {
            this.isLoading = true
            const api = axios.create()
            axios.all([
                api.get('/api/character/' + this.character_id),
                api.get('/api/parameter/' + this.character_id),
            ]).then(axios.spread((res,res2) => {
                this.character = res.data
                this.items = [
                    { text: 'CV', name: this.character.character_voice },
                    { text: '性別', name: this.character.gender },
                    { text: '誕生日', name: this.character.birthday },
                    { text: '年齢', name: this.character.age },
                    { text: '血液型', name: this.character.blood_type },
                    { text: '身長', name: this.character.height },
                    { text: '体重', name: this.character.weight },
                ]
                this.parameters = res2.data
            })).catch(error => {
                alert('キャラクターの取得に失敗しました')
            }).finally(resp => {
                this.isLoading = false
            })
        },
    }
}
</script>

