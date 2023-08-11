import { createRouter, createWebHistory } from "vue-router";

import Index from "../components/index.vue";

const routes = [
    {
        path: "/",
        name:"/",
        component: Index,
    },

    // {   path:'/', component: Index  },
    // {
    //     path:'/:pathMatch(.*)*',
    //     component:NotFound
    // }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
