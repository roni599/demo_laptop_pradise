import Login from '../components/auth/Login.vue';
import Register from '../components/auth/Register.vue';
import Forget from '../components/auth/Forget.vue';
import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/Home.vue';
import Logout from '../components/auth/Logout.vue';

const routes = [
    {
        name: 'LoginForm',
        component: Login,
        path: '/'
    },
    {
        name: 'RegisterForm',
        component: Register,
        path: '/register'
    },
    {
        name: 'Forget',
        component: Forget,
        path: '/forget'
    },
    {
        name: 'Home',
        component: Home,
        path: '/home'
    },
    {
        name: 'Logout',
        component: Logout,
        path: '/logout'
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;