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
        <RadarChart :chart-data="chartdata" />
    </v-card>
</template>

<script>
export default {
    props: {
        character: Object,
        items: Array,
    },
    mounted () {
        this.fillData()
    },
    data() {
        return {
            chartdata: {}
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
    }
}
</script>