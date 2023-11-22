import type { Config } from 'tailwindcss'

const config: Config = {
  content: [
    "./src/pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/components/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/app/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    extend: {
      fontFamily: {
        Poppins: ["var(--font-Poppins)"],
        Gilroy: ["var(--font-Gilroy)"],
      },
      colors: {
        biru: "#000371",
        kuning: "#f3cd2d",
      },
    },
  },
  plugins: [],
};
export default config
