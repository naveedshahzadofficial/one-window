import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import SearchResult from "../views/SearchResult.vue";
import RlcoDetail from "../views/RlcoDetail";

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
            path: "/rlco/:id",
            name: "rlco.show",
            component: RlcoDetail,
            props: true,
        },
            ]
});
