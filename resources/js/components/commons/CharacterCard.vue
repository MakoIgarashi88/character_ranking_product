<template>
    <v-card class="my-3" height="100%">
        <v-row>
            <v-col>
                <IconSm :src="character.image_name" class="text-center mb-5"/>
            </v-col>
        </v-row>

        <v-divider class="pb-3"/>

        <v-row justify="center">
            <v-col cols="10" class="text-center pb-0">
                <router-link :to="{ path: 'character/' + character.id }">
                    {{ character.name }}
                </router-link>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="10" class="text-center">
                {{ character.anime_title }}
            </v-col>
        </v-row>
    </v-card>
</template>

<script>
export default {
    props: {
        character: Object,
    },
    data() {
        return {

        }
    },
}
</script>