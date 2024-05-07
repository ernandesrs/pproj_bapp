const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
        colors: {
            ...colors,
            'admin': {
                'primary': colors.indigo[500],
                'secondary': colors.blue[400],
                'success': colors.emerald[400],
                'danger': colors.rose[400],
                'info': colors.blue[400],
                'dark': colors.gray[700],
                'light': colors.gray[200],

                'font': {
                    'base': colors.gray[800],
                    'light': colors.gray[500],
                    'dark': colors.gray[900]
                },

                'sidebar': colors.gray[950]
            },
            'customer': {
                'primary': colors.pink[500],
                'secondary': colors.rose[400],
            }
        }
    },
    plugins: [],
}
