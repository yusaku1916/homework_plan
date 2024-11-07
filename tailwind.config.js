// const defaultTheme = require('tailwindcss/defaultTheme');

// /** @type {import('tailwindcss').Config} */
// module.exports = {
//     mode: 'jit',
//     purge: [
//         './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
//         './storage/framework/views/*.php',
//         './resources/views/**/*.blade.php',
//         './resources/js/**/*.js',
//     ],

//     theme: {
//         extend: {
//             fontFamily: {
//                 sans: ['Figtree', ...defaultTheme.fontFamily.sans],
//             },
//         },
//     },

//     plugins: [require('@tailwindcss/forms')],
// };
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ], 
    safelist: [ 
        'bg-blue-50', 
        'bg-blue-100', 
        'bg-blue-200', 
        'bg-blue-300', 
        'bg-blue-400', 
        'bg-blue-500', 
        'bg-blue-600', 
        'bg-blue-700', 
        'bg-blue-800', 
        'bg-blue-900', 
        'text-xl', 
        'text-2xl', 
        'text-3xl', 
        'text-4xl', 
        'text-5xl', 
        'text-xs',
        'text-2xs',
        'text-3xs',
        'text-4xs',
        'text-5xs',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [require('@tailwindcss/forms')],
};

