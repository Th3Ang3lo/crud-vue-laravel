<template>
  <fragment>
    <top-bar />

    <div class="p-3">
      <div class="d-sm-flex justify-content-sm-between">
        <h1>Tarefas</h1>

        <b-button
          variant="success"
          @click="$router.push(routes.CREATE_USER.path)"
        >
          Nova tarefa
        </b-button>
      </div>

      <b-modal
        id="modal-delete-task"
        title="Apagar tarefa"
        @ok="handleDeleteTask(taskId)"
      >
        Tem certeza que deseja apagar esta tarefa? Esta ação não poderá ser desfeita.
      </b-modal>

      <b-table
        striped
        hover
        :items="tasks"
        :fields="fields"
      >
        <template #head(id)>
          #
        </template>

        <template #head(task)>
          Tarefa
        </template>

        <template #head(conclused_at)>
          Concluído em
        </template>

        <template #head(action)>
          Ação
        </template>

        <template #cell(id)="data">
          #{{ data.value }}
        </template>

        <template #cell(task)="data">
          {{ data.value }}
        </template>

        <template #cell(conclused_at)="data">
          {{ data.value }}
        </template>

        <template #cell(status)="data">
          <task-status :status="data.value" />
        </template>

        <template #cell(action)="data">
          <b-button
            variant="warning"
            @click="$router.push(routes.EDIT_USER.path.replace(':id', data.value.id))"
          >
            <i class="fa-solid fa-pen" />
          </b-button>

          &nbsp;

          <b-button
            v-b-modal.modal-delete-task
            variant="danger"
            @click="handleShowDeleteTaskModal(data.value.id)"
          >
            &times;
          </b-button>
        </template>
      </b-table>
    </div>
  </fragment>
</template>

<script>

import TopBar from '@/components/TopBar.vue'
import routes from '@/routes'

import TaskStatus from '@/components/TaskStatus'

import api from '@/services/api'

export default {
  name: 'ListTasksPage',
  components: {
    TopBar,
    TaskStatus
  },
  data(){
    return {
      taskId: 0,
      routes,

      fields: ['id', 'task', 'conclused_at', 'status', 'action'],
      tasks: [
/*
        {
          id: 1,
          task: 'Ir as compras',
          conclused_at: new Date().toLocaleString(),
          status: 'pending',
          action: {
            id: 1
          }
        },
*/
      ]
    }
  },
  mounted(){
    api.get('/admin/task/list')
      .then(response => {
        const { data } = response.data
        this.tasks = data.map(task => {
          task.action = {
            id: task.id
          }

          task.conclused_at = task.conclused_at ? new Date(task.conclused_at).toLocaleString('pt-BR') : '-'

          return task
        })
      })
      .catch(error => {})
  },
  methods: {
    handleShowDeleteTaskModal(taskId) {
      this.taskId = taskId
    },
    async handleDeleteTask(taskId) {
      // TODO: implement delete task API
    }
  }
}

</script>
