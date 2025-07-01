/** @type {import('tailwindcss').Config} */


import defaultTheme from 'tailwindcss/defaultTheme';

export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['"IBM Plex Sans"', ...defaultTheme.fontFamily.sans],
        mono: ['"IBM Plex Mono"', ...defaultTheme.fontFamily.mono],
        condensed: ['"IBM Plex Sans Condensed"', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [],
};
