<template>
    <div class="icon-lg">
        <v-avatar size="170">
            <!-- <img src="/storage/images/default.jpeg"> -->
            <img :src="src" v-if="src">
            <img :src="src_copy" v-else>
        </v-avatar>
    </div>
</template>

<script>
export default {
    props: {
        src: String,
    },
    data() {
        return {
            src_copy: '/storage/images/default.png',
        }
    },
    // watch: {
    //     src_copy = src,
    // }
}
</script>