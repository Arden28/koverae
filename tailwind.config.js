import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
    prefix: 'tw-',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    // ModalUI
    safelist: [
        'sm:tw-max-w-sm',
        'sm:tw-max-w-md',

        'md:tw-max-w-lg',
        'md:tw-max-w-xl',

        'lg:tw-max-w-2xl',
        'lg:tw-max-w-3xl',

        'xl:tw-max-w-4xl',
        'xl:tw-max-w-5xl',

        '2xl:tw-max-w-6xl',
        '2xl:tw-max-w-7xl',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
