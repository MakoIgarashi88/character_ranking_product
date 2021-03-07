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
                            <v-form ref="form" v-model="valid">
                                <v-row justify="center">
                                    <v-col class="text-center">
                                        <v-text-field
                                        label="キャラクター名"
                                        placeholder="キャラクター名"
                                        :disabled="is_update"
                                        :rules="nameRules"
                                        v-model="character.name"
                                        outlined
                                        dense
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col class="text-center">
                                        <v-text-field
                                        label="作品名"
                                        placeholder="作品名"
                                        :disabled="is_update"
                                        :rules="animeNameRules"
                                        v-model="character.anime_title"
                                        outlined
                                        dense
                                        ></v-text-field>
                                    </v-col>
                                </v-row>    
                                <v-row justify="center">
                                    <v-col class="pb-0">
                                        <v-text-field
                                        cols="12"
                                        sm="9"
                                        label="声優"
                                        placeholder="声優"
                                        :rules="characterVoiceRules"
                                        v-model="character.character_voice"
                                        outlined
                                        dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="3" class="pt-0">
                                        <v-checkbox
                                        class="mt-0"
                                        v-model="character.character_voice"
                                        value="不明"
                                        label="不明"
                                        ></v-checkbox>
                                    </v-col>
                                </v-row>
                                <v-row justify="center">
                                    <v-col class="pb-0">
                                        <v-text-field
                                        cols="12"
                                        sm="9"
                                        label="性別"
                                        placeholder="例：女性/男性/なし"
                                        :rules="genderRules"
                                        v-model="character.gender"
                                        outlined
                                        dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="3" class="pt-0">
                                        <v-checkbox
                                        class="mt-0"
                                        v-model="character.gender"
                                        value="不明"
                                        label="不明"
                                        ></v-checkbox>
                                    </v-col>
                                </v-row>
                                <v-row justify="center">
                                    <v-col class="pb-0">
                                        <v-text-field
                                        cols="12"
                                        sm="9"
                                        label="誕生日"
                                        placeholder="例：1/31"
                                        :rules="birthdayRules"
                                        v-model="character.birthday"
                                        outlined
                                        dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="3" class="pt-0">
                                        <v-checkbox
                                        class="mt-0"
                                        v-model="character.birthday"
                                        value="不明"
                                        label="不明"
                                        ></v-checkbox>
                                    </v-col>
                                </v-row>
                                <v-row justify="center">
                                    <v-col class="pb-0">
                                        <v-text-field
                                        cols="12"
                                        sm="9"
                                        label="年齢"
                                        placeholder="例：16歳"
                                        :rules="ageRules"
                                        v-model="character.age"
                                        outlined
                                        dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="3" class="pt-0">
                                        <v-checkbox
                                        class="mt-0"
                                        v-model="character.age"
                                        value="不明"
                                        label="不明"
                                        ></v-checkbox>
                                    </v-col>
                                </v-row>
                                <v-row justify="center">
                                    <v-col class="pb-0">
                                        <v-text-field
                                        cols="12"
                                        sm="9"
                                        label="血液型"
                                        placeholder="例：A型 X型"
                                        :rules="bloodTypeRules"
                                        v-model="character.blood_type"
                                        outlined
                                        dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="3" class="pt-0">
                                        <v-checkbox
                                        class="mt-0"
                                        v-model="character.blood_type"
                                        value="不明"
                                        label="不明"
                                        ></v-checkbox>
                                    </v-col>
                                </v-row>
                                <v-row justify="center">
                                    <v-col class="pb-0">
                                        <v-text-field
                                        cols="12"
                                        sm="9"
                                        label="身長"
                                        placeholder="例：170cm"
                                        :rules="heightRules"
                                        v-model="character.height"
                                        outlined
                                        dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="3" class="pt-0">
                                        <v-checkbox
                                        class="mt-0"
                                        v-model="character.height"
                                        value="不明"
                                        label="不明"
                                        ></v-checkbox>
                                    </v-col>
                                </v-row>
                                <v-row justify="center">
                                    <v-col class="pb-0">
                                        <v-text-field
                                        cols="12"
                                        sm="9"
                                        label="体重"
                                        placeholder="60kg"
                                        :rules="weightRules"
                                        v-model="character.weight"
                                        outlined
                                        dense
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="3" class="pt-0">
                                        <v-checkbox
                                        class="mt-0"
                                        v-model="character.weight"
                                        value="不明"
                                        label="不明"
                                        ></v-checkbox>
                                    </v-col>                                    
                                </v-row>
                                <v-row justify="center">
                                    <v-col>
                                        <v-textarea
                                        label="詳細"
                                        :error-messages="character.detail && character.detail.length > 400 ? '400文字以内で入力してください' : ''"
                                        v-model="character.detail"
                                        outlined
                                        dense
                                        ></v-textarea>
                                    </v-col>
                                </v-row>
    
                                <v-row justify="center">
                                    <v-col class="text-center pb-5">
                                        <v-btn color="primary" :disabled="!valid" @click="onCreateUpdate">{{ is_update ? '編集' : '登録' }}</v-btn>
                                    </v-col>
                                </v-row>
                            </v-form>
                        </v-col>
                    </v-row>
                </v-card>
            </v-col>
        </v-row>
        <Loading :isLoading="isLoading"/>
    </v-container>
</template>

<script>
export default {
    props: [ "character_id" ],
    data() {
        return {
            valid: false,
            character: {
                detail: ''
            },
            image: '/storage/images/default.jpeg',
            upload_image: null,
            isLoading: false,

            nameRules: [
                v => !!v || '必須入力',
                v => (v && v.length <= 20) || '20文字以内で入力してください',
            ],
            animeNameRules: [
                v => !!v || '必須入力',
                v => (v && v.length <= 30) || '30文字以内で入力してください',
            ],
            characterVoiceRules: [
                v => !!v || '必須入力',
                v => (v && v.length <= 20) || '20文字以内で入力してください',
            ],
            genderRules: [
                v => !!v || '必須入力',
                v => (v && v.length <= 30) || '30文字以内で入力してください',
            ],
            birthdayRules: [
                v => !!v || '必須入力',
                v => (v && v.length <= 30) || '30文字以内で入力してください',
            ],
            ageRules: [
                v => !!v || '必須入力',
                v => (v && v.length <= 30) || '30文字以内で入力してください',
            ],
            bloodTypeRules: [
                v => !!v || '必須入力',
                v => (v && v.length <= 30) || '30文字以内で入力してください',
            ],
            heightRules: [
                v => !!v || '必須入力',
                v => (v && v.length <= 30) || '30文字以内で入力してください',
            ],
            weightRules: [
                v => !!v || '必須入力',
                v => (v && v.length <= 30) || '30文字以内で入力してください',
            ],
        }
    },
    mounted () {
        if (this.is_update) this.getItems()
    },
    computed: {
        is_update () {
            return this.character_id ? true : false
        }
    },
    methods: {
        getItems () {
            this.isLoading = true
            axios.get('/api/character/' + this.character_id)
            .then(res => {
                this.character = res.data
                this.image = this.character.image_name
            }).catch(error => {
                alert('キャラクターの取得に失敗しました')
            }).finally(res => {
                this.isLoading = false
            })
        },
        onCreateUpdate () {
            if (this.is_update) {
                this.isLoading = true
                axios.put('/api/character/' + this.character_id, {
                    character: this.character,
                    upload_image: this.upload_image,
                })
                .then(res => {
                    this.$router.push({ path: '/character/' + this.character_id })
                }).catch(res => {
                    alert('キャラクターの編集に失敗しました')
                })
            } else {
                this.isLoading = true
                axios.post('/api/character', {
                    character: this.character,
                    upload_image: this.upload_image,
                })
                .then(res => {
                    if (typeof res.data == 'string') {
                        alert(res.data)
                        this.isLoading = false
                    } else {
                        this.$router.push({ path: '/character/' + res.data.id })
                        this.isLoading = false
                    }
                }).catch(res => {
                    alert('キャラクターの作成に失敗しました')
                })
            }
        },

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

