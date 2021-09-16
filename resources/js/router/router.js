import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import SearchResult from "../views/SearchResult.vue";
import Overview from "../views/Overview";
import Favorite from "../views/Favorite";

export const router = createRouter({
    history: createWebHistory('/rlcos/'),
    linkActiveClass: 'text-dark bg-white',
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/search",
            name: "search",
            component: SearchResult,
            props: true,
        },
        {
            path: "/overview",
            name: "Overview",
            component: Overview,
            props: true,
        },
        {
            path: "/saved",
            name: "favorite",
            component: Favorite,
            props: true,
        },
            ]
});
