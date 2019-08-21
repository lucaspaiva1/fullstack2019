import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'

axios.defaults.headers = { 'Content-Type': 'application/json' }
axios.defaults.baseURL = process.env.VUE_APP_API_URL;

Vue.config.productionTip = false

import './assets/sass/app.scss';

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
