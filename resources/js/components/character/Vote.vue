<template>                    
    <v-container>
        <v-row justify="center">
            <v-col cols="11" sm="10" md="8" lg="6">
                <v-card>
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

                            <!--パラメータ-->
                            <v-row justify="center">
                                <v-col class="text-center pt-4">
                                    <h3>パラメーター</h3>
                                </v-col>
                            </v-row>
                            <v-row justify="center">
                                <v-col class="text-center pa-2">
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
                                                        v-model="item.value"
                                                        ></v-rating>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col class="text-center pb-5">
                                    <v-btn color="primary" @click="onSend">投票する</v-btn>
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
            api.get('/api/parameter/'),
            ]).then(axios.spread((res,res2) => {
                this.character = res.data
                this.parameters = res2.data
            })).catch(error => {
                alert('キャラクター情報の取得に失敗しました')
            }).finally(res => {
                this.isLoading = false
            })
        },
        onSend () {
            this.isLoading = true
            console.log(this.parameters)
            axios.post('/api/parameter', {
                character_id: this.character_id,
                parameters: this.parameters,
            }).then(res => {
                alert('投票されました')
            }).catch(error => {
                alert(error)
            }).finally(res => {
                this.$router.go(-1)
                this.isLoading = false
            })
        }
    }
}
</script>

