<template>
  <fragment>
    <top-bar />

    <div class="p-3">
      <h1>Alterar o usuário</h1>

      <p
        v-if="success"
        class="alert alert-success"
      >
        Usuário alterado com sucesso!
      </p>

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
            <p
              v-if="errors['email']"
              class="text-danger"
            >
              {{ errors['email'] }}
            </p>
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
            <p
              v-if="errors['password']"
              class="text-danger"
            >
              {{ errors['password'] }}
            </p>
          </b-form-group>

          <p
            v-if="errors['message']"
            class="text-danger"
          >
            {{ errors['message'] }}
          </p>

          <b-button
            variant="primary"
            :disabled="sending"
            type="submit"
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

import api from '@/services/api'

export default {
  name: 'EditUserPage',
  components: {
    TopBar
  },
  data(){
    return {
      userId: this.$route.params.id,
      name: null,
      email: null,
      password: null,

      errors: {
        name: null,
        email: null,
        password: null,
        message: null
      },
      sending: false,
      success: false
    }
  },
  mounted(){
    api.get('/admin/user/' + this.userId)
      .then(response => {
        const { data } = response.data

        const { name, email } = data
        this.name = name
        this.email = email
        this.password = null
      })
  },
  methods: {
    async handleSubmit(event){
      event.preventDefault()

      this.sending = true

      const { name, email, password } = this

      try {
        const response = await api.put('/admin/user/' + this.userId, { name, email, password })

        // reset
        this.password = null

        this.success = true
        this.errors = {
          name: null,
          email: null,
          password: null,
          message: null
        }

      } catch (error) {
        const { data, status } = error.response

        if(status === 400) {
          this.errors[data.field] = data.message
        } else {
          this.errors['message'] = data.message
        }
      } finally {
        this.sending = false
      }
    }
  }
}
</script>
