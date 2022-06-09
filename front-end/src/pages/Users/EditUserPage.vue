<template>
  <fragment>
    <top-bar />

    <div class="p-3">
      <h1>Alterar o usuário</h1>

      <div>
        <b-form
          class="px-4"
          @submit="handleSubmit"
        >
          <b-form-group
            label="Nome"
            label-for="name"
          >
            <b-form-input
              id="name"
              v-model="name"
              trim
            />
          </b-form-group>

          <b-form-group
            label="E-mail"
            label-for="email"
          >
            <b-form-input
              id="email"
              v-model="email"
              type="email"
              trim
            />
          </b-form-group>

          <b-form-group
            label="Senha"
            label-for="password"
          >
            <b-form-input
              id="password"
              v-model="password"
              type="password"
              trim
            />
          </b-form-group>

          <b-button
            variant="primary"
            :disabled="submited"
          >
            Alterar
          </b-button>
        </b-form>
      </div>
    </div>
  </fragment>
</template>

<script>

import TopBar from '@/components/TopBar.vue'

export default {
  name: 'EditUserPage',
  components: {
    TopBar
  },
  data(){
    return {
      submited: false
    }
  },
  methods: {
    handleSubmit(event){
      event.preventDefault()

      this.submited = true

      const { name, email, password } = this

      this.submited = false
    }
  }
}
</script>
