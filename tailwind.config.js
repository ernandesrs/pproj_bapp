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
            },
            'customer': {
                'primary': colors.pink[500],
                'secondary': colors.rose[400],
            }
        }
    },
    plugins: [],
}
