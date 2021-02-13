<template>
    <v-container>
        <v-card>
            <v-row justify="center">
                <v-col cols="10" class="text-center">
                    <v-text-field
                    label="ランキング名"
                    outlined
                    v-model="ranking_name"
                    :error-messages="ranking_name.length >= 20 ? '20文字以内で入力してください' : ''"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row justify="center">
                <v-col cols="10">
                    <v-card outlined>
                        <v-card-text>
                            <v-row justify="center">
                                <v-col cols="12" sm="4" md="3" lg="2" class="text-center" v-for="(param, index) in params" :key="index">
                                    <v-checkbox
                                    v-model="check_parameters"
                                    :label="param.label"
                                    :color="param.color"
                                    :value="param.key_name"
                                    hide-details
                                    class="mt-0"
                                    ></v-checkbox>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
            <v-row justify="center">
                <v-col class="text-center">
                    <v-btn color="primary"
                    @click="onStore"
                    :disabled="!ranking_name 
                    || ranking_name.length >= 20 
                    || check_parameters.length < 1"
                    >
                        作成
                    </v-btn>
                </v-col>
            </v-row>
        </v-card>
    </v-container>
</template>

<script>
export default {
    data () {
        return {
            ranking_name: "",
            check_parameters: [],
            params: [
                { label: "かわいい", key_name: "cute", color: "pink", },                
                { label: 'かっこいい', key_name: 'cool', color: 'blue', },
                { label: 'ワイルド', key_name: 'wild', color: 'blue-grey', },
                { label: '美しい', key_name: 'beautiful', color: 'purple', },
                { label: 'さわやか', key_name: 'fresh', color: 'light-green', },
                { label: '優しい', key_name: 'kind', color: 'lime', },
                { label: 'おとなしい', key_name: 'quiet', color: 'teal', },
                { label: '活発', key_name: 'active', color: 'deep-orange',},
                { label: '怖い', key_name: 'scare', color: 'indigo', },
                { label: '行動力', key_name: 'action', color: 'orange', },
                { label: '筋力', key_name: 'power', color: 'amber', },
                { label: 'すばやい', key_name: 'speed', color: 'light-blue', },
                { label: '戦略', key_name: 'strategy', color: 'green', },
                { label: '忍耐', key_name: 'endurance', color: 'yellow', },
                { label: '論理的', key_name: 'logic', color: 'cyan', },
                { label: '博識', key_name: 'knowledge', color: 'lime', },
                { label: '語彙力', key_name: 'vocabulary', color: 'red', },
                { label: '予測', key_name: 'forecast', color: 'pink', },
                { label: '記憶力', key_name: 'memory', color: 'amber', },
            ],
        }
    },
    methods: {
        onStore () {
            axios.post('/api/ranking/', {
                ranking_name: this.ranking_name,
                check_parameters: this.check_parameters,
            }).then(res => {
                alert('ランキングを作成しました')
                this.ranking_name = ""
                this.check_parameters = []
            }).catch(res => {
                alert('コメントの取得に失敗しました')
            })
        },
    },
    components: {
    }
}
</script>
<style lang="scss" scoped>
</style>