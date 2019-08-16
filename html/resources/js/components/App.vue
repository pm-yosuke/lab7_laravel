<template>
    <div>
        <div v-show="$route.path !== '/login'" class="bg-darkCrimson"
             data-role="appbar" data-expand-point="md">
            <router-link to="/" class="brand no-hover fg-white">
                D.O.S
            </router-link>
            <ul class="app-bar-menu ml-auto fg-white">
                <li><a @click="logout" href="#">ログアウト</a></li>
            </ul>
        </div>
        <div v-if="$route.path === '/login'">
            <router-view></router-view>
        </div>
        <div v-else id="view" data-role="navview">
            <div class="navview-pane">
                <button class="pull-button">
                    <i class="default-icon-menu"></i>
                </button>
                <ul class="navview-menu">
                    <li>
                        <router-link to="/works">
                            <span class="icon">
                                <i class="mif-star-empty"></i>
                            </span>
                            <span class="caption">
                                仕事
                            </span>
                        </router-link>
                    </li>
                    <!--li>
                        <a href="#">
                            <span class="icon">
                                <i class="mif-star-empty"></i>
                            </span>
                            <span class="caption">
                                発注
                            </span>
                        </a>
                    </li -->
                    <!-- li>
                        <a href="#">
                            <span class="icon">
                                <i class="mif-star-empty"></i>
                            </span>
                            <span class="caption">
                                受注
                            </span>
                        </a>
                    </li -->
                </ul>
            </div>
            <router-view class="navview-content"></router-view>
        </div>
    </div>
</template>

<style>
    #view {
        margin-top: 52px;
        min-height: calc(100vh - 52px);
        padding-left: 30px;
    }
</style>

<script>
    export default {
        methods: {
            logout() {
                axios.post('/api/v1/auth/logout').then(res => {
                    axios.defaults.headers.common['Authorization'] = '';
                    accessToken = null;
                    document.cookie = 'token=';
                    this.$router.push({path: '/login'});
                }).catch(error => {
                    console.error(error);
                });
            }
        }
    }
</script>
