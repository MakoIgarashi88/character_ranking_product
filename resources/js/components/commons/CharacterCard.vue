<template>
    <v-card class="my-3" height="100%">
        <v-row justify="center">
            <v-col cols="auto" class="text-center">
                <IconSm :src="character.image_name" class="my-5"/>
            </v-col>
        </v-row>


        <v-divider class="pb-3"/>

        <v-row justify="center">
            <v-col cols="10" class="text-center pb-0">
                <router-link :to="{ path: '/character/' + character.id }">
                    {{ character.name }}
                </router-link>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="10" class="text-center">
                {{ character.anime_title }}
            </v-col>
        </v-row>
        <v-row justify="center" v-if="chart && items.length > 2">
            <v-col cols="11"><RadarChart :chart-data="chartdata" /></v-col>
        </v-row>
        <div v-else-if="chart && items.length <= 2">
            <v-row>
                <v-col v-for="(param, index) in params" :key="index"  class="px-1">
                    <h3>{{ param.label }}</h3>
                    <h3>{{ param.point }}</h3>
                </v-col>
            </v-row>
        </div>
    </v-card>
</template>

<script>
export default {
    props: {
        character: Object,
        items: Array,
        chart: {
            type: Boolean,
            default: false,
        },
    },
    mounted () {
        if (this.chart) this.fillData()
    },
    data() {
        return {
            chartdata: {},
        }
    },
    methods: {
        fillData () {
            const labels = this.items.map(item => item.label)
            const points = this.items.map(item => this.character[item.name])
            this.chartdata = {
                labels: labels,
                datasets: [
                    {
                        data: points,
                        borderColor: "rgb(255,239,148,0.7)",
                        backgroundColor:"rgba(255,239,148,0.3)",
                    }
                ],
            }
        }
    },
    computed: {
        params () {
            if (!this.items) return []
            return this.items.map(item => {
                return {
                    label: item.label,
                    point: this.character[item.name],
                }
            })
        }
    }
}
</script>
<style lang='scss' scoped>

</style>