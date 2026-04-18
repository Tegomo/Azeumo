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
          DEFAULT: '#FF7400',
          light: '#FF9233',
          dark: '#E66800',
        },
        primary: {
          DEFAULT: '#FF7400',
          light: '#FF9233',
          dark: '#E66800',
          start: '#FF7400',
          end: '#E66800',
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
