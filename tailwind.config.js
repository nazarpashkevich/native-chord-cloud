import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from "tailwindcss/colors";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            ...colors,
            light: {
                primary: '#BFB7B6', // Silver
                secondary: '#435058', // Outer space
                background: '#F1F2EE', // White smoke
                surface: 'rgba(225,216,213,0.61)', // Silver
                text: 'rgba(40,46,48,0.97)', // Battleship gray
            },
            dark: {
                primary: '#DCF763', // Mindaro
                secondary: '#848C8E', // Battleship gray
                background: '#435058', // Outer space
                surface: '#848C8E', // Battleship gray
                text: '#F1F2EE', // White smoke
            },
        }
    },

    plugins: [forms],
};
