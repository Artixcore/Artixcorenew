import { createRouter, createWebHistory } from "vue-router";

import Index from "../components/App.vue";
// import Index from "../components/frontend/index.vue";

const routes = [

    { path: "/", component: Index },

    {
        path: "/:pathMatch(.*)*",
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
