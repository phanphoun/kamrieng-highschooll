/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    50: '#fefce8',
                    100: '#fef9c3',
                    200: '#fef08a',
                    300: '#fde047',
                    400: '#facc15',
                    500: '#eab308',
                    600: '#ca8a04',
                    700: '#a16207',
                    800: '#854d0e',
                    900: '#713f12',
                    950: '#422006',
                },
                school: {
                    navy: '#192436',
                    gold: '#f7b316',
                    blue: '#086fd3',
                    'blue-hover': '#0757a8',
                    muted: '#9ca6b4',
                },
                khmer: {
                    orange: '#f97316',
                    yellow: '#facc15',
                    blue: '#1d4ed8',
                },
            },
            fontFamily: {
                khmer: ['"Khmer OS"', '"MoolBoran"', 'sans-serif'],
                sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
