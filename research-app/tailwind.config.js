/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        mainBg: "#DBF9D8",
        buttonColor: "#44A44B",
        formColor: "#F8FFF8",
        mainTextColor: "#1E1E1E",
        footerColor: "#1E1E1E",
        subTextColor: "#3B3B3B",
      }
    },
  },
  plugins: [],
}