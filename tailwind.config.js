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
          DEFAULT: '#C9A84C',
          light: '#e2c97e',
          dark: '#a07d2c',
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
