import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/views/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    
    theme: {
        extend: {
          colors: {
            premium: {
              dark: '#2c3e50',
              medium: '#34495e',
              light: '#ecf0f1',
              accent: '#d4af37',
              secondary: '#8e44ad'
            }
          },
          fontFamily: {
            sans: ['Helvetica', 'Arial', 'sans-serif']
          }
        }
    },
    plugins: [],
};
