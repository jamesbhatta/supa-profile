const routes = {
    mode: "history",

    routes: [
        {
            path: "/",
            name: "home",
            component: () => import("./pages/Home.vue"),
        },
        {
            path: "/about",
            name: "about",
            component: () => import("./pages/About.vue"),
        },
        {
            path: "/geographical-political-situation",
            name: "geographical-political-situation",
            component: () =>
                import("./pages/geographical-political-situations/Index.vue"),
        },
        {
            path: "/demographic-status",
            name: "demographic-status",
            component: () => import("./pages/demographic-status/Index.vue"),
        },
        {
            path: "/economical-situation",
            name: "economical-situation",
            component: () => import("./pages/economical-situation/Index.vue"),
        },
        {
            path: "/social-status",
            name: "social-status",
            component: () => import("./pages/social-status/Index.vue"),
        },
        {
            path: "/condition-of-physical-infrastructure",
            name: "condition-of-physical-infrastructure",
            component: () =>
                import(
                    "./pages/condition-of-physical-infrastructure/Index.vue"
                ),
        },

        {
            path: "/status-of-tourism-development",
            name: "status-of-tourism-development",
            component: () =>
                import("./pages/status-of-tourism-development/Index.vue"),
        },
        {
            path: "/industry-business",
            name: "industry-business",
            component: () => import("./pages/industry-business/Index.vue"),
        },
        {
            path: "/state-of-agricultural-sector",
            name: "state-of-agricultural-sector",
            component: () =>
                import("./pages/state-of-agricultural-sector/Index.vue"),
        },
        {
            path: "/forest-and-environment",
            name: "forest-and-environment",
            component: () => import("./pages/forest-and-environment/Index.vue"),
        },
        {
            path: "/miscellaneous",
            name: "miscellaneous",
            component: () => import("./pages/miscellaneous/Index.vue"),
        },

        {
            path: "/minister-profile",
            name: "minister-profile",
            component: () => import("./pages/MinisterProfile.vue"),
        },
    ],
};

export default routes;
