<template>
    <v-container>
        <v-card>
            <v-row justify="center">
                <v-col cols="10" class="text-center pt-5">
                    <v-text-field
                    label="ランキング名"
                    outlined
                    v-model="ranking_name"
                    suffix="ランキング"
                    hide-details
                    :error-messages="ranking_name.length >= 20 ? '20文字以内で入力してください' : ''"
                    ></v-text-field>
                </v-col>
            </v-row>
            <v-row justify="center">
                <v-col cols="10" class="text-center">
                    <p class="mb-0">各項目の合計点数が高いキャラクターが一位になります</p>
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
        <Loading :isLoading="isLoading"/>
    </v-container>
</template>

<script>
export default {
    data () {
        return {
            ranking_name: "",
            check_parameters: [],
            params: [],
            isLoading: false,
        }
    },
    mounted () {
        this.getItems ()
    },
    methods: {
        getItems () {
            this.isLoading = true
            axios.get('/api/parameter_label')
            .then(res => {
                this.params = res.data
            }).catch(error => {
                alert(error)
            }).finally(res => {
                this.isLoading = false
            })
        },
        onStore () {
            this.isLoading = true
            axios.post('/api/ranking/', {
                ranking_name: this.ranking_name,
                check_parameters: this.check_parameters,
            }).then(res => {
                if (typeof res.data == 'string') {
                    alert(res.data)
                    this.isLoading = false
                } else {
                    alert('ランキングを作成しました')
                    this.ranking_name = ""
                    this.check_parameters = []
                    this.$router.push({ path: '/ranking/' + res.data.id })
                    this.isLoading = false
                }
            }).catch(res => {
                alert('ランキングの作成に失敗しました')
            })
        },
    },
}
</script>
<style lang="scss" scoped>
</style>