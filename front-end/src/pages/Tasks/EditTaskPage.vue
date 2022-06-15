<template>
  <fragment>
    <top-bar />

    <div class="p-3">
      <h1>Alterar tarefa</h1>

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
            label="Tarefa"
            label-for="task"
          >
            <b-form-input
              id="task"
              v-model="task"
              trim
            />
            <p
              v-if="errors['task']"
              class="text-danger"
            >
              {{ errors['task'] }}
            </p>
          </b-form-group>

          <b-form-group
            label="Status"
            label-for="status"
          >
            <b-form-select
              id="status"
              v-model="status"
              :options="options"
            />
            <p
              v-if="errors['status']"
              class="text-danger"
            >
              {{ errors['status'] }}
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
  name: 'EditTaskPage',
  components: {
    TopBar
  },
  data(){
    return {
      taskId: this.$route.params.id,
      options: [
        { value: 'pending', text: 'Pendente' },
        { value: 'done', text: 'Concluída' }
      ],
      task: null,
      status: 'pending',

      errors: {
        task: null,
        status: null,
        message: null
      },
      sending: false,
      success: false
    }
  },
  mounted(){
    api.get('/admin/task/' + this.taskId)
      .then(response => {
        const { data } = response.data

        const { task, status } = data
        this.task = task
        this.status = status
      })
  },
  methods: {
    async handleSubmit(event){
      event.preventDefault()

      this.sending = true

      const { task, status } = this

      try {
        const response = await api.put('/admin/task/' + this.taskId,{ task, status })

        this.success = true
        this.errors = {
          task: null,
          status: null,
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
