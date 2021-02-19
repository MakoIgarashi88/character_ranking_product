<template>
    <v-container>
        <v-row class="justify-center">
            <v-col cols="12" class="text-center pa-5">
                <h2>ランキング一覧</h2>
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
                    type="search"
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

        <v-row v-show="pageLength">
            <v-col cols="12" class="justify-center mb-5">
                <v-pagination v-model="page" :length="pageLength" circle></v-pagination>
            </v-col>
        </v-row>
        
        <v-row>
            <v-col>
                <v-simple-table>
                    <template v-slot:default>
                        <tbody>
                            <tr v-for="(ranking, index) in rankings" :key="index">
                                <td>
                                    <div class="pa-3">
                                        <router-link :to="{ name: 'ranking.show', params: { 'ranking_id': ranking.id } }">
                                            <h3>{{ranking.name}}ランキング</h3>
                                        </router-link>
                                        <v-chip-group column>
                                            <v-chip v-for="(item, index) in ranking.params"
                                            :key="index"
                                            text-color="white"
                                            :color="item.color"
                                            x-small
                                            class="ma-1">
                                            {{ item.label }}
                                            </v-chip>
                                        </v-chip-group>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>
        </v-row>

        <v-row v-show="pageLength">
            <v-col cols="12" class="justify-center mt-5">
                <v-pagination v-model="page" :length="pageLength" circle></v-pagination>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data () {
        return {
            rankings: [],
            search_word: "",
            page: 1,
            pageLength: 0,
        }
    },
    mounted () {
        this.getRankings()
    },
    methods: {
        getRankings () {
            axios.get('/api/ranking/list', {
                params: {
                    search_word: this.search_word,
                    page: this.page,
                }
            }).then(res => {
                this.rankings = res.data.rankings
                this.pageLength = res.data.pageLength
            }).catch(res => {
                alert('一覧の取得に失敗しました')
            })
        },
        onSearch () {
            this.page = 1
            this.getRankings()
        },
        clearMessage () {
            this.search_word = ''
        },
    },
    watch: {
        page () {
            this.getRankings()
        }
    }
}
</script>
<style lang="scss" scoped>
</style>