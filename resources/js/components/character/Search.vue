<template>
    <v-container>
        <v-row justify="center">
            <v-col class="text-center">
                <h1>キャラクター検索</h1>
            </v-col>
        </v-row>
        <v-form @submit.prevent="onSearch">
            <v-row justify="center" class="align-center mb-5">
                <v-col cols="10" sm="6">
                    <v-text-field
                    v-model="search_word"
                    label="キーワードで検索"
                    background-color="white"
                    solo
                    clear-icon="mdi-close-circle"
                    clearable
                    type="text"
                    hide-details
                    @click:clear="clearMessage"
                    ></v-text-field>
                </v-col>
                <v-col cols="2" sm="auto" class="px-0">
                    <v-btn type="submit" color="primary" class="btn-width-sm">
                        <v-icon>mdi-magnify</v-icon>
                    </v-btn>
                </v-col>
            </v-row>
        </v-form>

        <v-row v-if="characters.length == 0 && is_init">
            <v-col>
                <p>{{ searched_word }}に一致するキャラクターは見つかりませんでした。</p>
            </v-col>
        </v-row>

        <v-row v-show="pageLength">
            <v-col cols="12" class="justify-center">
                <v-pagination v-model="page" :length="pageLength" circle></v-pagination>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12" sm="4" md="3" lg="2" v-for="(character, index) in characters" :key="index">
                <CharaCard :character="character" />
            </v-col>
        </v-row>
        <v-row v-show="pageLength">
            <v-col cols="12" class="justify-center">
                <v-pagination v-model="page" :length="pageLength" circle></v-pagination>
            </v-col>
        </v-row>
        <Loading :isLoading="isLoading"/>
    </v-container>
</template>

<script>
import SearchCharacterCard from '../commons/SearchCharacterCard.vue'
export default {
    data () {
        return {
            search_word: '',
            searched_word: '',
            page: 1,
            pageLength: 0,
            characters: [],
            isLoading: false,
            is_init: false,
        }
    },
    mounted () {
        this.getCharacters ()
    },
    methods: {
        getCharacters () {
            this.isLoading = true
            axios.get('/api/character', {
                params: {
                    search_word: this.search_word,
                    page: this.page,
                }
            }).then(res => {
                this.characters = res.data.characters
                this.pageLength = res.data.pageLength
                this.searched_word = res.data.searched_word
            }).catch(error => {
                alert(error)
            }).finally(res => {
                this.isLoading = false
                this.is_init = true
            })
        },
        onSearch () {
            this.page = 1
            this.getCharacters()
        },
        clearMessage () {
            this.search_word = ''
        },
    },
    watch: {
        page () {
            this.getCharacters()
        }
    },
    components: { SearchCharacterCard },
}
</script>
<style lang="scss" scoped>
</style>