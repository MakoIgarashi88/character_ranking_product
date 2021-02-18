<template>
    <v-container>
        <v-form @submit.prevent="getCharacters">
            <v-row justify="center" class="align-center mb-5">
                <v-col cols="auto">
                    <v-text-field
                    v-model="search_word"
                    label="キーワードで検索"
                    background-color="white"
                    filled
                    clear-icon="mdi-close-circle"
                    clearable
                    type="text"
                    hide-details
                    @click:clear="clearMessage"
                    ></v-text-field>
                </v-col>
                <v-col cols="auto">
                    <v-btn type="submit" color="primary"><v-icon>mdi-magnify</v-icon></v-btn>
                </v-col>
            </v-row>
        </v-form>
        <v-row>
            <v-col cols="12" sm="4" md="3" lg="2" v-for="(character, index) in characters" :key="index">
                <CharaCard :character="character" />
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data () {
        return {
            search_word: '',
            characters: [],
        }
    },
    mounted () {
        this.getCharacters ()
    },
    methods: {
        getCharacters () {
            axios.get('/api/character', {
                params: {
                    search_word: this.search_word
                }
            }).then(res => {
                console.log(res.data)
                this.characters = res.data
            }).catch(error => {
                alert(error)
            })
        },
        clearMessage () {
            this.search_word = ''
        },
    },
}
</script>
<style lang="scss" scoped>
</style>