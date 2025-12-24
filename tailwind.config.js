/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./templates/**/*.php",
    "./template-parts/*.php",
    "./inc/*.php",
    "./api/get/*.php",
    "./inc/**/*.php",
    "./inc/***/**/*.php",
    "./assets/js/*.js",
    "./assets/css/*.css",
    "./src/css/*.css",
    "./src/js/*.css",
    "./hooks/*.php",
    "./hooks/**/*.php",
    "./inc/*.php",
  ],
  theme: {
    extend: {
      colors: {
        lbyellow: "#ffcb30",
        lbyellow2: "#E6B31E",
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
};
