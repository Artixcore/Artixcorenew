import { createRouter, createWebHistory } from "vue-router";

import Index from "../components/frontend/index/master.vue";
import Login from "../components/Auth/Login.vue";
import Register from "../components/Auth/Register.vue";
// import Index from "../components/frontend/index.vue";

const routes = [
    {
        path: "/",
        component: Index, 
    },
    {
        path: "/Login",
        component: Login,
    },
    {
        path: "/Register",
        component: Register,
    },
    // {
    //     path: "/:pathMatch(.*)*",
    //     component: NotFound,
    // },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
