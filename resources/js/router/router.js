import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import SearchResult from "../views/SearchResult.vue";
import Overview from "../views/Overview";
import Favorite from "../views/Favorite";
import Detail from "../views/Detail";
import PageNotFound from "../views/PageNotFound";

export const router = createRouter({
    history: createWebHistory('/smedaonewindow/'),
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
        {
            path: "/rlco/detail/:id",
            name: "rlcos.show",
            component: Detail
        }
            ]
});
