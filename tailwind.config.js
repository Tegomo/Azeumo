/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.{blade.php,vue,js,ts}',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        navy: {
          DEFAULT: '#0A1628',
          700: '#0d1f38',
          800: '#081220',
        },
gold: {
          DEFAULT: '#d1651c',
          light: '#e07a35',
          dark: '#c63d24',
        },
        primary: {
          DEFAULT: '#d1651c',
          light: '#e07a35',
          dark: '#c63d24',
          start: '#d1651c',
          end: '#c63d24',
        },
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
        display: ['Montserrat', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
