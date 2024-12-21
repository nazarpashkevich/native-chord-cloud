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
            animation: {
                marquee: 'marquee 25s ease-in-out infinite',
            },
            keyframes: {
                marquee: {
                    '0%': {
                        transform: 'translateX(0%)',
                        animationTimingFunction: 'ease-in',
                    },
                    '50%': {
                        transform: 'translateX(-50%)',
                        animationTimingFunction: 'ease-out',
                    },
                    '100%': {
                        transform: 'translateX(0%)',
                    },
                },
            }
        },
        colors: {
            ...colors,
            light: {
                primary: '#BFB7B6', // Silver
                secondary: '#435058', // Outer space
                background: '#F1F2EE', // White smoke
                surface: 'rgba(225,216,213,0.61)', // Silver
                "surface-attended": 'rgba(225,216,213,0.35)', // Silver
                "surface-active": 'rgba(188,181,177,0.7)', // Silver
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
