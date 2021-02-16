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
                            <v-row>
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
            params: [],
        }
    },
    mounted () {
        this.getItems ()
    },
    methods: {
        getItems () {
            axios.get('/api/parameter_label')
            .then(res => {
                this.params = res.data
            }).catch(error => {
                alert(error)
            })
        },
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