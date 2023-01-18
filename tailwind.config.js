/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/views/*.php"],
  theme: {
    extend: {
      fontFamily: {
        lato: ['Lato', 'sans-serif']
      }
    },
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: false,
  },
}
