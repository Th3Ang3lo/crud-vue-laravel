import { createRouter, createWebHistory } from 'vue-router'

import Routes from '.'

const routes = Object.values(Routes)

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth) {
    //const token = $cookies.get('token')
    const token = true

    if (token) {
      next()
    } else {
      next(Routes.LOGIN.path)
    }
  } else {
    next()
  }
})

export default router
