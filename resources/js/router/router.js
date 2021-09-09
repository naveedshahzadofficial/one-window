import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import SearchResult from "../views/SearchResult.vue";

export const router = createRouter({
    base: process.env.MIX_BASE_URL,
    history: createWebHistory(),
    linkActiveClass: 'text-dark bg-white',
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/rlcos",
            name: "home",
            component: Home
        },
        {
            path: "/search",
            name: "search",
            component: SearchResult,
            props: true,
        },
            ]
});
