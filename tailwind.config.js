/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./templates/login/*.html.twig",
    "./templates/game/*.html.twig",
    "./templates/admin/*.html.twig",
    "./assets/react/controllers/*.jsx",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
