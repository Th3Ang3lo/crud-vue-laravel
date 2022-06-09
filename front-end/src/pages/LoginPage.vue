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
          </b-form-group>

          <b-form-group
            label="Senha"
            label-for="password"
          >
            <b-form-input
              id="password"
              v-model="password"
              trim
            />
          </b-form-group>

          <b-button
            type="submit"
            variant="primary"
          >
            Entrar
          </b-button>
        </b-form>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'LoginPage',
  components: {},
  methods: {
    onSubmit(event){
      event.preventDefault()

      const { email, password } = this
    }
  }
}

</script>

<style scoped>
  .content {
    height: 100%;
  }
</style>
