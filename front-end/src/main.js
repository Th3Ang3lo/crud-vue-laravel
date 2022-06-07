import { createApp } from 'vue'
import App from './App.vue'

import router from '@/routes/AppRoutes'

createApp(App)
  .use(router)
  .mount('#app')
