import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            borderRadius: {
                'extra-lg': '1.5rem',
            },

            spacing: {
                '3rem': '2.3rem',
                '4rem': '3rem',
                '5rem': '4rem',
                '6rem': '5rem',
                '7rem': '7rem',
                '10rem': '10rem',
                '20rem': '18rem',
                '22rem': '22rem',
                '9rem': ' 9rem',
                '30rem': '30rem',
            },


        },

        colors:{

        'high-purplle':'#1B132D',
        'orange': '#FC9A03',
        'basic-gray': '#C1C1C1',
        'purplle':'#563274',
        'gray':'#D9D9D9',
        'white':'#ffffff',
        'black':'#000000',
        'red': '#c1121f',
        'cinza-escuro':'#202C3D',

        },
    },

    plugins: [forms],
};
