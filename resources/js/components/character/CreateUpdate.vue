<template>                    
    <v-container>
        <v-row justify="center">
            <v-col cols="11" sm="10" md="8" lg="6">
                <v-card>
                    <!--キャラクター画像-->
                    <v-row justify="center">
                        <v-col cols="auto" class="text-center">
                            <IconLg :src="image" class="my-5" v-if="!upload_image" />
                            <IconLg :src="upload_image" class="my-5" v-else />
                        </v-col>
                    </v-row>
                    <v-row justify="center">
                        <v-col cols="10">
                            <v-file-input
                            label="画像を選択してください"
                            outlined
                            dense
                            prepend-icon="mdi-camera"
                            accept="image/*"
                            @change="changeImage"
                            ></v-file-input>
                        </v-col>
                    </v-row>
            
                    <v-divider class="pb-3"/>

                    <v-row justify="center">
                        <v-col cols="10">
                            <v-row justify="center">
                                <v-col class="text-center">
                                    <v-text-field
                                    :label="is_update ? 'キャラクター名' : ''"
                                    :placeholder="is_update ? '' : 'キャラクター名'"
                                    :disabled="is_update"
                                    v-model="character.name"
                                    outlined
                                    dense
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col class="text-center">
                                    <v-text-field
                                    :label="is_update ? '作品名' : ''"
                                    :placeholder="is_update ? '' : '作品名'"
                                    :disabled="is_update"
                                    v-model="character.anime_title"
                                    outlined
                                    dense
                                    ></v-text-field>
                                </v-col>
                            </v-row>    
                            <v-row justify="center">
                                <v-col>
                                    <v-text-field
                                    :label="is_update ? 'CV' : ''"
                                    :placeholder="is_update ? '' : 'CV'"
                                    v-model="character.character_voice"
                                    outlined
                                    dense
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row justify="center">
                                <v-col>
                                    <v-text-field
                                    :label="is_update ? '性別' : ''"
                                    :placeholder="is_update ? '' : '性別'"
                                    v-model="character.gender"
                                    outlined
                                    dense
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row justify="center">
                                <v-col>
                                    <v-text-field
                                    :label="is_update ? '誕生日' : ''"
                                    :placeholder="is_update ? '' : '誕生日'"
                                    v-model="character.birthday"
                                    outlined
                                    dense
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row justify="center">
                                <v-col>
                                    <v-text-field
                                    :label="is_update ? '年齢' : ''"
                                    :placeholder="is_update ? '' : '年齢'"
                                    v-model="character.age"
                                    outlined
                                    dense
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row justify="center">
                                <v-col>
                                    <v-text-field
                                    :label="is_update ? '血液型' : ''"
                                    :placeholder="is_update ? '' : '血液型'"
                                    v-model="character.bloodtype"
                                    outlined
                                    dense
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row justify="center">
                                <v-col>
                                    <v-text-field
                                    :label="is_update ? '身長' : ''"
                                    :placeholder="is_update ? '' : '身長'"
                                    v-model="character.height"
                                    outlined
                                    dense
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row justify="center">
                                <v-col>
                                    <v-text-field
                                    :label="is_update ? '体重' : ''"
                                    :placeholder="is_update ? '' : '体重'"
                                    v-model="character.weight"
                                    outlined
                                    dense
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row justify="center">
                                <v-col>
                                    <v-textarea
                                    :label="is_update ? '詳細' : ''"
                                    :placeholder="is_update ? '' : '詳細'"
                                    v-model="character.detail"
                                    outlined
                                    dense
                                    ></v-textarea>
                                </v-col>
                            </v-row>

                            <v-row justify="center">
                                <v-col class="text-center pb-5">
                                    <v-btn color="primary" @click="onCreateUpdate">{{ is_update ? '編集' : '登録' }}</v-btn>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    props: [ "character_id" ],
    data() {
        return {
            character: {},
            image: '/storage/images/default.jpeg',
            upload_image: null,
        }
    },
    mounted () {
        if (this.is_update) this.getItems()
        // character.imageがあれば、imageに挿入してdefault.jpegを書き換える
        if (this.character.image_name) {
            this.image = this.character.image_name
        }

    },
    computed: {
        is_update () {
            return this.character_id ? true : false
        }
    },
    methods: {
        getItems () {
            this.character = {
                id: 1,
                name: "爆豪勝己",
                anime_title: "僕のヒーローアカデミア",
                image_name: "/storage/images/02.jpeg",
                character_voice: '岡本信彦',
                gender: 'female',
                birthday: '4月20日',
                age: '16',
                bloodtype: 'A',
                height: '172',
                weight: '不明',
                detail: '雄英高校ヒーロー科。薄い金髪に赤目の三白眼が特徴的な少年。主人公である緑谷出久とは幼馴染みで彼からの呼称は「かっちゃん」。将来の夢は本人曰く、「オールマイトをも超えるトップヒーローとなり、高額納税者ランキングに名を刻むこと」完璧主義者。',
            }
        },
        onCreateUpdate () {
            console.log('通過')
        },
        // onCreateUpdate () {
        //     console.log('通過')
        //     if (this.is_update) { // 編集

        //     } else {              // 新規

        //     }
        //     // ２パターン
        //     // １つ目
        //     // 文字として送る（今までのやり方）
        //     // 文字列型

        //     const body = {
        //         name: 'あああ',
        //         id: '3',
        //         upload_image: 'hjdviffwnjcipeq;rnio',
        //     }
        //     const body = new FormData()
        //     body.append("name", 'あああ')
        //     body.append("id", '3')
        //     body.append("upload_image", upload_image)
        //     $name = $request->file('upload_image')->store('public/update');
        //     $parameter->image_name = $name
        //     $parameter->save();
        //     $request->input()->name
        //     axios.post('api/user',body,headers)

        //     // ２つ目
        //     // 画像形式のまま送る
        //     // ファイル型
        //     // axiosにたいしてファイル型=form_dataで送るっていう指定をする
        //     const headers = { "content-type": "multipart/form-data" }
        //     axios.get(url,body,{ "content-type": "multipart/form-data" })
        //     // http通信には↓のやつがある
        //     // header
        //     // body
        //     // url
        // },
        // file: {
        //     name: 'default.jpeg',
        //     result: 'fjaijiefjeiojfsoafjioedjfoaefijeifjaf',
        // },
        changeImage (file) {
            if (file !== undefined && file !== null) {
                if (file.name.lastIndexOf('.') <= 0) {
                    return
                }
                const fr = new FileReader()
                fr.readAsDataURL(file)
                fr.addEventListener('load', () => {
                    this.upload_image = fr.result
                    file = ""
                })
            } else {
                this.upload_image = null
            }
        }
    },
    watch: {
        "$route" (to, from) {
            this.character = {
                name: "",
                anime_title: "",
                image_name: "",
                character_voice: "",
                gender: "",
                birthday: "",
                age: "",
                bloodtype: "",
                height: "",
                weight: "",
                detail: "",
            }
            this.image = '/storage/images/default.jpeg'
            this.upload_image = null
        }
    },
}
</script>

