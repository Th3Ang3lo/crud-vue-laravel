import DashboardPage from '@/pages/DashboardPage.vue'
import LoginPage from '@/pages/LoginPage.vue'
import EditUserPage from '@/pages/Users/EditUserPage.vue'
import CreateUserPage from '@/pages/Users/CreateUserPage.vue'
import ListTasksPage from '@/pages/Tasks/ListTasksPage.vue'
import EditTaskPage from '@/pages/Tasks/EditTaskPage.vue'

export default {
  HOME: {
    path: '/',
    name: 'DashboardPage',
    component: DashboardPage,
    meta: {
      requiresAuth: true
    }
  },
  TASKS: {
    path: '/tasks',
    name: 'ListTasksPage',
    component: ListTasksPage,
    meta: {
      requiresAuth: true
    }
  },
  EDIT_TASK: {
    path: '/tasks/:id/edit',
    name: 'EditTaskPage',
    component: EditTaskPage,
    meta: {
      requiresAuth: true
    }
  },
  CREATE_USER: {
    path: '/users/new',
    name: 'CreateUserPage',
    component: CreateUserPage,
    meta: {
      requiresAuth: true
    }
  },
  EDIT_USER: {
    path: '/users/:id/edit',
    name: 'EditUserPage',
    component: EditUserPage,
    meta: {
      requiresAuth: true
    }
  },
  LOGIN: {
    path: '/login',
    name: 'Login',
    component: LoginPage
  }
}
