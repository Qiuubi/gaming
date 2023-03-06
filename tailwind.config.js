/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.{js, jsx, ts, tsx}",
    "./templates/**/*.html.twig",
    "./assets/react/controllers/*.jsx",
    "./assets/react/controllers/styles/*.{js, jsx, ts, tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
