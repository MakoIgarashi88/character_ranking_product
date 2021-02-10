<template>
    <v-container>
        <v-card>
            <v-row justify="center">
                <v-col cols="10" class="text-center">
                    <v-text-field label="ランキング名" outlined></v-text-field>
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
                                    :value="param.value"
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
                    <v-btn color="primary" @click="onStore">
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
            check_parameters: [],
            params: [
                {
                    label: "かわいい",
                    value: "cute",
                    color: "pink",
                },                
                {
                    label: "かっこいい",
                    value: "cool",
                    color: "light-blue",
                },
                {
                    label: "ワイルド",
                    value: "wild",
                    color: "red",
                },
                {
                    label: "美しい",
                    value: "beautiful",
                    color: "purple",
                },
                {
                    label: "かわいい",
                    value: "cute",
                    color: "pink",
                },                
                {
                    label: "かっこいい",
                    value: "cool",
                    color: "light-blue",
                },
                {
                    label: "ワイルド",
                    value: "wild",
                    color: "red",
                },
                {
                    label: "美しい",
                    value: "beautiful",
                    color: "purple",
                },
            ],
        }
    },
    methods: {
        onStore () {
            console.log(this.check_parameters)
        },
    },
    components: {
    }
}
</script>
<style lang="scss" scoped>
</style>