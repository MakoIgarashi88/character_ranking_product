<template>
    <v-container>
        <v-row justify="center">
            <v-col cols="12" sm="10" md="8">
                <v-text-field
                v-model="word"
                background-color="white"
                append-outer-icon='mdi-send'
                filled
                clear-icon="mdi-close-circle"
                clearable
                type="text"
                @click:append-outer="onSearch"
                @click:clear="clearMessage"
                ></v-text-field>
            </v-col>
        </v-row>
        <v-row justify="end">
        </v-row>
        <v-row justify="center">
            <v-col cols="10" sm="3" lg="2" v-for="(character, index) in characters" :key="index">
                <CharaCard :character="character" />
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data () {
        return {
            word: '',
            characters: [],
        }
    },
    mounted () {
        this.getCharacters ()
    },
    methods: {
        getCharacters () {
            axios.get('/api/character/list')
            .then(res => {
                this.characters = res.data
            }).catch(error => {
                alert(error)
            })
        },
        onSearch () {
            axios.post('/api/character/search', {
                word: this.word
            }).then(res => {
                console.log(res.data)
                this.characters = res.data
            }).catch(error => {
                alert(error)
            })
        },
        clearMessage () {
            this.word = ''
            this.getCharacters ()
        },
    },
}
</script>
<style lang="scss" scoped>
</style>