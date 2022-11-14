const defaultTheme = require('tailwindcss/defaultTheme');
const path = require('path')
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        path.resolve(__dirname, './node_modules/litepie-datepicker/**/*.js'),
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    darkMode:'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'litepie-primary':colors.sky,
                'litepie-secondary':colors.gray
            }
        },
    },
    variants:{
        extend:{
            cursor:['disabled'],
            textOpacity:['disabled'],
            textColor:['disabled']
        }
    },
    plugins: [require('@tailwindcss/forms')],
};
