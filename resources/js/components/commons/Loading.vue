<template>
    <v-overlay color="orange lighten-5" :value="isLoading">
        <v-progress-circular
            color="green"
            indeterminate
            size="80"
        ></v-progress-circular>
    </v-overlay>
</template>
<script>
export default {
    props: {
        isLoading: {
            type: Boolean,
            default: false,
        }
    },
}
</script>