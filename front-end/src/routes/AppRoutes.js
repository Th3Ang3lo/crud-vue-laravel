import { createRouter, createWebHistory } from 'vue-router'

import Routes from './'

const routes = Object.values(Routes)

const router = createRouter({
  history: createWebHistory(),
  routes
})
export default router
