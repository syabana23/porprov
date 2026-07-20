module.exports = {
  darkMode: 'class',
  content: ['./resources/**/*.blade.php', './resources/**/*.js', './resources/**/*.vue'],
  theme: {
    extend: {
      colors: {
        primary: '#013469',
        accent: '#FDB813',
      },
      animation: {
        'fade-in': 'fadeIn 0.5s ease-out forwards',
        'scale-up': 'scaleUp 0.3s ease-out forwards',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        scaleUp: {
          '0%': { transform: 'scale(0.95)' },
          '100%': { transform: 'scale(1)' },
        },
      },
    },
  },
  plugins: [],
};
