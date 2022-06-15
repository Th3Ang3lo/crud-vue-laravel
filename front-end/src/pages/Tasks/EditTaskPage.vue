<template>
  <fragment>
    <top-bar />

    <div class="p-3">
      <h1>Alterar tarefa</h1>

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
          </b-form-group>

          <b-form-group
            label="Status"
            label-for="status"
          >
            <b-form-select
              id="status"
              v-model="selected"
              :options="options"
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
  name: 'EditTaskPage',
  components: {
    TopBar
  },
  data(){
    return {
      submited: false,
      selected: 'pending',
      options: [
        { value: 'pending', text: 'Pendente' },
        { value: 'done', text: 'Concluída' }
      ]
    }
  },
  methods: {
    handleSubmit(event){
      event.preventDefault()

      this.submited = true

      const { task, status } = this

      this.submited = false
    }
  }
}
</script>
