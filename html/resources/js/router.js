import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/pages/Home';
import Login from './components/pages/Login';
import Register from './components/pages/Register';

import WorkIndex from './components/pages/Work/Index';
import WorkShow from './components/pages/Work/Show';

import MyWorkIndex from './components/pages/MyWork/Index';
import MyWorkShow from './components/pages/MyWork/Show';
import MyWorkCreate from './components/pages/MyWork/Create';

import User from './components/pages/User';


Vue.use(VueRouter);

const routes = [
    {path: '/login', component: Login, meta: {allowGuest: true}},
    {path: '/register', component: Register, meta: {allowGuest: true}},

    {path: '/', component: Home},

    {path: '/works', component: WorkIndex},
    {path: '/works/:id', component: WorkShow},

    {path: '/myworks', component: MyWorkIndex},
    {path: '/myworks/create', component: MyWorkCreate},
    {path: '/myworks/:id', component: MyWorkShow},

    {path: '/user', component: User},
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach(async (to, from, next) => {
    // ゲストアクセス許可ならログインチェックナシで画面遷移
    if (to.matched.some(record => record.meta.allowGuest)) {
        next();
        return;
    }

    // ログインチェック
    document.cookie.split(';').some(value => {
        const content = value.split('=');

        if (content[0].trim() === 'token') {
            accessToken = content[1] || null;
            return true;
        }
    });

    if (accessToken !== null) {
        await axios.post('/api/v1/auth/me').then(res => {
            // nothing to do.
        }).catch(error => {
            accessToken = null;
            document.cookie = 'token=';
        });
    }

    // リダイレクト
    if (accessToken === null) {
        next({
            path: '/login',
            query: {redirect: to.fullPath},
        });

        return;
    }

    next();
});

export default router;

