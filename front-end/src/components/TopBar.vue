<template>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark p-2">
    <div class="w-100 d-flex justify-content-between">
      <a
        class="navbar-brand"
        href="#"
        @click="$router.push(dashboard)"
      >
        Dashboard
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbar"
      >
        <span class="navbar-toggler-icon" />
      </button>
    </div>

    <div
      id="navbar"
      class="navbar-collapse collapse w-100"
    >
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a
            class="nav-link"
            :href="dashboard"
            @click.stop.prevent="$router.push(dashboard)"
          >Usuários</a>
        </li>

        <li class="nav-item">
          <a
            class="nav-link"
            :href="tasks"
            @click.stop.prevent="$router.push(tasks)"
          >Tarefas</a>
        </li>

        <li class="nav-item">
          <a
            class="nav-link text-danger"
            href="/logout"
            @click="onLogout"
          >Sair</a>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
import router from '@/routes'

export default {
  name: 'TopBar',
  data(){
    return {
      dashboard: router.HOME.path,
      tasks: router.TASKS.path,
      login: router.LOGIN.path
    }
  },
  methods: {
    onLogout(event){
      event.preventDefault()
      this.$cookies.remove('token')

      this.$router.push(this.login)
    }
  },
}
</script>
