<template>
    <div class="h-vh-100 bg-darkGray">
        <form @submit.prevent="login" id="login-form"
              class="bg-white p-6 mx-auto border bd-default win-shadow">
            <i class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></i>
            <h2>ログイン</h2>
            <hr class="thin mt-4 mb-4 bg-white">
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
                <button type="submit" class="button place-right">ログイン</button>
            </div>

            <div class="form-group" style="text-align: center">
                <router-link to="/register">新規登録はこちら</router-link>
            </div>
        </form>
    </div>
</template>

<style>
    #login-form {
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
                email: '',
                password: '',
            }
        },
        created() {
            if (this.$route.query.register === 'success') {
                Metro.notify.create('ユーザー登録しました。', 'INFO', {cls: 'success'});
            }
        },
        methods: {
            login() {
                axios.post('/api/v1/auth/login', {
                    email: this.email,
                    password: this.password
                }).then(res => {
                    const token = res.data.access_token;
                    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
                    accessToken = token;
                    document.cookie = `token=${token}`;
                    this.$router.push({path: '/'});
                }).catch(error => {
                    Metro.notify.create('認証に失敗しました。', 'エラー', {
                        cls: 'alert'
                    });
                });
            }
        }
    }
</script>
