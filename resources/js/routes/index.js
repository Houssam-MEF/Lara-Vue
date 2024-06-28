// resources/js/routes/index.js

import { createRouter, createWebHistory } from 'vue-router';
import Xampp from '../Pages/Subjects/Xampp.vue';
import Laravel from '../Pages/Subjects/Laravel.vue';
import Vuejs from '../Pages/Subjects/Vuejs.vue';
import Welcome from '../Pages/Welcome.vue';


const routes = [
    { path: '/', component: Welcome, name: 'welcome' },
    { path: '/subjects/xampp', component: Xampp, name: 'subject-xampp' },
    { path: '/subjects/laravel', component: Laravel, name: 'subject-laravel' },
    { path: '/subjects/vuejs', component: Vuejs, name: 'subject-vuejs' },
    // Add more routes for other subjects as needed
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
