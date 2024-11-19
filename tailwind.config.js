import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                "hanken-grotesk": ["Hanken Grotesk", "sans-serif"],
            },
            colors: {
                black: "#1c1c1c",
                dark: "#2b2b2b",
                light_blue: "#f2f6f9",
                cards: {
                    1: "#e5def0",
                    2: "#d6edd9",
                    3: "#f6f0d8",
                },
            },
        },
    },

    plugins: [forms],
};
