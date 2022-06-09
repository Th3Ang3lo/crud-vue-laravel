import { createApp } from 'vue'

import Fragment from 'vue-fragment'
import VueCookies from 'vue-cookies'
import BootstrapVue3 from 'bootstrap-vue-3'

import App from './App.vue'

import router from '@/routes/AppRoutes'

createApp(App)
  .use(Fragment)
  .use(router)
  .use(VueCookies)
  .use(BootstrapVue3)
  .mount('#app')
