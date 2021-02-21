<template>
    <div>
        <!--コメントリスト-->
        <v-row v-show="comments.length">
            <v-col>
                <v-card outlined>
                    <v-toolbar color="primary" dark dens class="mb-2">コメント</v-toolbar>
                    <div class="comment-window">
                        <div v-for="(comment, index) in comments" :key="index">
                            <!-- 0 == false, 1 == true, 2 == true -->
                            <v-divider v-show="index" :key="'key'+index"/>
                            <v-list dense class="py-0">                       
                                <v-list-item>
                                    <v-list-item-title class="comment-body">{{comment.body}}</v-list-item-title>
                                </v-list-item>
                            </v-list>
                        </div>
                    </div>
                </v-card>
            </v-col>
        </v-row>

        <!--メッセージフォーム-->
        <v-row>
            <v-col>
                <v-textarea 
                v-model="message"
                solo 
                label="コメントを投稿する"
                :error-messages="message.length > 100 ? '100文字以内で入力してください' : ''"
                :hide-details="message.length <= 100"
                ></v-textarea>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="auto">
                <v-btn 
                    color="primary" 
                    @click="onStore"
                    :disabled="!message || message.length > 100">
                    送信
                </v-btn>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    props: [ 'character_id' ],
    data() {
        return {
            message: "",
            comments: [],
        }
    },
    mounted () {
        this.getComments ()
    },
    methods: {
        getComments () {
            axios.get('/api/comment/' + this.character_id)
            .then(res => {
                this.comments = res.data
            }).catch(res => {
                alert('コメントの取得に失敗しました')
            })
        },
        onStore () {
            axios.post('/api/comment', {
                character_id: this.character_id,
                message: this.message,
            }).then(res => {
                this.comments.unshift(res.data)
                this.message = ""
            })
        }
    }
}
</script>
<style lang="scss" scoped>
.comment {
    &-window {
        height: 10rem;
        min-height: 5rem;
        max-height: 20rem;
        overflow-y: auto;
        resize: vertical;
    }
    &-body {
        white-space: pre-line;
    }
}
</style>