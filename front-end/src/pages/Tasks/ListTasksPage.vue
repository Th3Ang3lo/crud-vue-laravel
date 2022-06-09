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
        id="modal-delete-user"
        title="Apagar usuário"
        @ok="handleDeleteUser(userId)"
      >
        Tem certeza que deseja apagar este usuário? Esta ação não poderá ser desfeita.
      </b-modal>

      <b-table
        striped
        hover
        :items="items"
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
            v-b-modal.modal-delete-user
            variant="danger"
            @click="handleShowDeleteUserModal(data.value.id)"
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

export default {
  name: 'ListTasksPage',
  components: {
    TopBar,
    TaskStatus
  },
  data(){
    return {
      userId: 0,
      routes,

      fields: ['id', 'task', 'conclused_at', 'status', 'action'],
      items: [
        {
          id: 1,
          task: 'Ir as compras',
          conclused_at: new Date().toLocaleString(),
          status: 'pending',
          action: {
            id: 1
          }
        },
      ]
    }
  },
  methods: {
    handleShowDeleteUserModal(userId) {
      this.userId = userId
    },
    async handleDeleteUser(userId) {
      // TODO: implement delete user API
    }
  }
}

</script>
