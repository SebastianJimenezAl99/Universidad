/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}","./*.{html,js,php}"],
  theme: {
    extend: {
      backgroundColor: {
        'fondo-yelow': '#FFF5D2',
        'grisOscuro' : '#353A40',
      },
      height:{
        '620' : '620px',
      },
      minHeight:{
        '620' : '620px',
      },
      width:{
        '1350' : '1350px',
      },
      minWidth:{
        '1350' : '1350px',
      },
      zIndex:{
        '1' : '1',
      },
      maxHeight:{
        '400' : '455px'
      },
    },
  },
  plugins: [],
}

