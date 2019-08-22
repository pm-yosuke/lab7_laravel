<template>
    <div>
        <div class="h-vh-100 bg-darkGray">
            <form @submit.prevent="register" id="register-form"
                  class="bg-white p-6 mx-auto border bd-default win-shadow">
                <i class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></i>
                <h2>新規ユーザー登録</h2>
                <hr class="thin mt-4 mb-4 bg-white">
                <div class="form-group">
                    <label>
                        <input v-model="name" type="text" placeholder="ユーザー名"
                               data-role="input"
                               data-prepend="<i class='mif-user'></i>"
                               data-validate="required">
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <input v-model="email" type="email" placeholder="メールアドレス"
                               data-role="input"
                               data-prepend="<i class='mif-envelop'></i>"
                               data-validate="required email">
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <input v-model="password" type="password" placeholder="パスワード"
                               data-role="input"
                               data-prepend="<i class='mif-key'></i>"
                               data-validate="required">
                    </label>
                </div>
                <div class="form-group mt-10 clear">
                    <button type="submit" class="button place-right">新規登録</button>
                </div>

                <div class="form-group" style="text-align: center">
                    <router-link to="/login">キャンセル</router-link>
                </div>
            </form>
        </div>
    </div>
</template>

<style>
    #register-form {
        width: 350px;
        height: auto;
        top: 50%;
        transform: translateY(-50%);
    }
</style>

<script>
    export default {
        data() {
            return {
                name: '',
                email: '',
                password: '',
            }
        },
        methods: {
            register() {
                axios.post('/api/v1/auth/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password
                }).then(res => {
                    this.$router.push({path: '/login?register=success'});
                }).catch(error => {
                    Metro.notify.create('ユーザー登録に失敗しました', 'エラー', {
                        cls: 'alert'
                    });
                });
            }
        }
    }
</script>
