/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors:{
        primaryTitle:"#F96666",
        primaryContent:"#577D86",
        primarySubcontent:"#7B2869",
        primaryBase:"#B9E6D3",
        primaryAccent:"#159895",
        primaryBg:"#111923",
        primarynoob:"#ffffff",
      }
    },
  },
  plugins: [],
}

