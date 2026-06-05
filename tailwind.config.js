import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                cream: { DEFAULT: '#F8FAFC', 2: '#EEF2F6' },
                charcoal: { DEFAULT: '#0A192F', 2: '#112240' },
                mid: '#8892B0',
                light: '#CCD6F6',
                accent: { DEFAULT: '#14C8F0', lime: '#A5F56D', pink: '#FF007F' },
                'dark-bg': '#020C1B',
            },
            fontFamily: {
                serif: ['"Satoshi"', ...defaultTheme.fontFamily.sans],
                sans: ['"Satoshi"', ...defaultTheme.fontFamily.sans],
                mono: ['"IBM Plex Mono"', ...defaultTheme.fontFamily.mono],
            },
            fontSize: {
                'hero': ['clamp(48px, 7vw, 96px)', { lineHeight: '1.05', fontWeight: '700' }],
                'h2': ['clamp(32px, 4vw, 56px)', { lineHeight: '1.1', fontWeight: '600' }],
                'h3': ['clamp(22px, 2.5vw, 32px)', { lineHeight: '1.2' }],
                'body-lg': ['18px', { lineHeight: '1.6', fontWeight: '400' }],
                'label': ['12px', { lineHeight: '1', fontWeight: '500', letterSpacing: '0.08em' }],
            },
            spacing: {
                '18': '4.5rem',
                '22': '5.5rem',
                '30': '7.5rem',
                '34': '8.5rem',
                '38': '9.5rem',
            },
            maxWidth: {
                'content': '1280px',
            },
            transitionDuration: {
                '400': '400ms',
                '600': '600ms',
                '800': '800ms',
            },
            keyframes: {
                'fade-in-up': {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                'fade-in': {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                'slide-up': {
                    '0%': { transform: 'translateY(100%)' },
                    '100%': { transform: 'translateY(0)' },
                },
                'underline-grow': {
                    '0%': { transform: 'scaleX(0)', transformOrigin: 'left' },
                    '100%': { transform: 'scaleX(1)', transformOrigin: 'left' },
                },
            },
            animation: {
                'fade-in-up': 'fade-in-up 0.6s ease-out forwards',
                'fade-in': 'fade-in 0.4s ease-out forwards',
                'slide-up': 'slide-up 0.5s ease-out forwards',
                'underline-grow': 'underline-grow 0.3s ease-out forwards',
            },
        },
    },
    plugins: [],
};
