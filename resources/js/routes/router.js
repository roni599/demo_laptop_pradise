import { createRouter, createWebHistory } from 'vue-router';

import Login from '../components/auth/Login.vue';
import Register from '../components/auth/Register.vue';
import Forget from '../components/auth/Forget.vue';
import Home from '../components/Home.vue';
import Logout from '../components/auth/Logout.vue';

import Employee_create from '../components/employee/Employee_create.vue';
import All_employee from '../components/employee/All_employee.vue';

import Supplier_create from '../components/supplier/Supplier_create.vue';
import All_supplier from '../components/supplier/All_supplier.vue';

import Category_create from '../components/category/Category_create.vue';
import All_category from '../components/category/All_category.vue';

import Product_create from '../components/product/Product_create.vue';
import All_product from '../components/product/All_product.vue';

const routes = [
    { name: 'LoginForm', component: Login, path: '/' },
    { name: 'RegisterForm', component: Register, path: '/register' },
    { name: 'Forget', component: Forget, path: '/forget' },
    { name: 'Home', component: Home, path: '/home' },
    { name: 'Logout', component: Logout, path: '/logout' },

    { name: 'Employee_create', component: Employee_create, path: '/employee_create' },
    { name: 'All_employee', component: All_employee, path: '/all_employee' },

    { name: 'Supplier_create', component: Supplier_create, path: '/supplier_create' },
    { name: 'All_supplier', component: All_supplier, path: '/all_supplier' },

    { name: 'Category_create', component: Category_create, path: '/category_create' },
    { name: 'All_category', component: All_category, path: '/all_category' },

    { name: 'Product_create', component: Product_create, path: '/product_create' },
    { name: 'All_product', component: All_product, path: '/all_product' },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;