import {createRouter, createWebHistory} from "vue-router";


export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            component: () => import("./Pages/Home.vue")
        },
        {
            path: "/test",
            component: () => import("./Pages/TestRoute.vue")
        }
    ]
});
