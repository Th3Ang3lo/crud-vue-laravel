<template>
  <div class="bg-dark content">
    <div class="d-flex justify-content-center align-items-center h-100 p-2">
      <div class="h-100 d-flex justify-content-center align-items-center">
        <b-form
          class="card p-3"
          @submit="onSubmit"
        >
          <h2 class="text-center">
            Login
          </h2>

          <b-form-group
            label="E-mail"
            label-for="email"
          >
            <b-form-input
              id="email"
              v-model="email"
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
            type="submit"
            variant="primary"
            :disabled="sending"
          >
            Entrar
          </b-button>
        </b-form>
      </div>
    </div>
  </div>
</template>

<script>

import api from '@/services/api'

import routes from '@/routes'

export default {
  name: 'LoginPage',
  components: {},
  data(){
    return {
      errors: {
        email: null,
        password: null,
        message: null
      },
      sending: false
    }
  },
  methods: {
    async onSubmit(event){
      event.preventDefault()
      this.sending = true

      const { email, password } = this

      try {
        const response = await api.post('/admin/auth', { email, password })
        const { token, user } = response.data

        this.$cookies.set('token', token)
        this.$cookies.set('user', JSON.stringify(user))

        this.$router.push(routes.HOME.path)
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

<style scoped>
  .content {
    height: 100%;
  }
</style>
