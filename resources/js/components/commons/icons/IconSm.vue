<template>
    <div class="icon-sm">
        <v-avatar size="120">
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
}
</script>