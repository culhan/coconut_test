import { createRouter, createWebHistory } from "vue-router";

import UserIndex from "../components/UserIndex";

const routes = [
    {
        path : '/home',
        component: UserIndex
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})