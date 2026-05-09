import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'pens-navy': '#0F172A',
                'pens-blue': '#1E3A8A',
                'pens-cyan': '#0EA5E9',
                'pens-light': '#38BDF8',
                'pens-gray': '#F8FAFC',
            },
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
