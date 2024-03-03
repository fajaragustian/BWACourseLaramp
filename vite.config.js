import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
// import { ngrok } from "vite-plugin-ngrok";
import path from "path";

export default defineConfig({
    plugins: [
        // ngrok("2d84UZ0CGYZ3KjWvMZvdI4VL4yh_wiJaUa57fHJG7To3MgcH"),
        laravel({
            input: [
                "resources/template/auth/css/sb-admin-2.min.css",
                "resources/template/auth/vendor/fontawesome-free/css/all.min.css",
                "resources/template/auth/vendor/jquery/jquery.min.js",
                // "resources/template/auth/vendor/bootstrap/js/bootstrap.bundle.min.js",
                // "resources/template/auth/vendor/jquery-easing/jquery.easing.min.js",
                "resources/template/auth/js/sb-admin-2.min.js",
                "resources/template/frontend/assets/styles/main.css",
                "resources/template/frontend/assets/styles/main.scss",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
        },
    },
    // plugins: [
    //     laravel({
    //         input: [
    //             'resources/sass/app.scss',
    //             'resources/js/app.js',
    //         ],
    //         refresh: true,
    //     }),
    // ],
});
