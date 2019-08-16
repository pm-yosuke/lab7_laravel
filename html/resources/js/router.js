import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/pages/Home';
import Login from './components/pages/Login';

import WorkIndex from './components/pages/Work/Index';
import WorkShow from './components/pages/Work/Show';

import User from './components/pages/User';


Vue.use(VueRouter);

const routes = [
    {path: '/login', component: Login},

    {path: '/', component: Home, meta: {requiresAuth: true}},

    {path: '/works', component: WorkIndex, meta: {requiresAuth: true}},
    {path: '/works/:id', component: WorkShow, meta: {requiresAuth: true}},

    {path: '/user', component: User, meta: {requiresAuth: true}},
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    // ログインチェック
    document.cookie.split(';').some(value => {
        const content = value.split('=');

        if (content[0].trim() === 'token') {
            accessToken = content[1] || null;
            return true;
        }
    });

    if (accessToken !== null) {
        axios.post('/api/v1/auth/me').then(res => {
            // nothing to do.
        }).catch(error => {
            accessToken = null;
            document.cookie = 'token=';
        });
    }

    // リダイレクト
    if (to.matched.some(record => record.meta.requiresAuth) && accessToken === null) {
        next({
            path: '/login',
            query: {redirect: to.fullPath},
        });
    } else {
        next();
    }
});

export default router;

