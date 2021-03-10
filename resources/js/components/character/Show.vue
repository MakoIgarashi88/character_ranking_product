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
                                <v-col class="text-center py-5">
                                    <h2>パラメーター</h2>
                                </v-col>
                            </v-row>

                            <v-row><v-col><h3 class="text-center py-3">雰囲気</h3></v-col></v-row>
                            <RadarChart :chart-data="mood_chartdata"/>
                            <v-row><v-col><h3 class="text-center py-3">性格</h3></v-col></v-row>
                            <RadarChart :chart-data="personal_chartdata"/>
                            <v-row><v-col><h3 class="text-center py-3">戦闘力</h3></v-col></v-row>
                            <RadarChart :chart-data="power_chartdata"/>
                            <v-row><v-col><h3 class="text-center py-3">知性</h3></v-col></v-row>
                            <RadarChart :chart-data="intelligence_chartdata"/>

                            <v-row justify="center" v-if="character.detail">
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
            isLoading: false,
            mood_chartdata: {},
            personal_chartdata: {},
            power_chartdata: {},
            intelligence_chartdata: {},
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
                    { text: '声優', name: this.character.character_voice },
                    { text: '性別', name: this.character.gender },
                    { text: '誕生日', name: this.character.birthday },
                    { text: '年齢', name: this.character.age },
                    { text: '血液型', name: this.character.blood_type },
                    { text: '身長', name: this.character.height },
                    { text: '体重', name: this.character.weight },
                ]
                this.fillData(res2.data)
            })).catch(error => {
                alert('キャラクターの取得に失敗しました')
            }).finally(resp => {
                this.isLoading = false
            })
        },
        fillData (parameters) {
            const bdColor = "rgb(255,239,148,0.7)"
            const bgColor = "rgba(255,239,148,0.3)"
            const chunk_labels = parameters.map(chunks => {
                return chunks.map(parameter => parameter.label)
            })
            const chunk_points = parameters.map(chunks => {
                return chunks.map(parameter => parameter.value)
            })

            this.mood_chartdata = {
                labels: chunk_labels[0],
                datasets: [{ data: chunk_points[0], borderColor: bdColor, backgroundColor: bgColor }],
            }
            this.personal_chartdata = {
                labels: chunk_labels[1],
                datasets: [{ data: chunk_points[1], borderColor: bdColor, backgroundColor: bgColor }],
            }
            this.power_chartdata = {
                labels: chunk_labels[2],
                datasets: [{ data: chunk_points[2], borderColor: bdColor, backgroundColor: bgColor }],
            }
            this.intelligence_chartdata = {
                labels: chunk_labels[3],
                datasets: [{ data: chunk_points[3], borderColor: bdColor, backgroundColor: bgColor }],
            }
        },
    }
}
</script>

