module.exports = {
  root: true,
  env: {
    node: true,
    'vue/setup-compiler-macros': true // <--- Habilita defineProps, defineEmits, etc.
  },
  extends: [
    'plugin:vue/vue3-essential',
    'eslint:recommended'
  ],
  parserOptions: {
    parser: '@babel/eslint-parser'
  },
  rules: {
    // Suas regras personalizadas (se houver)
  }
}