<template>
  <fragment>
    <top-bar />

    <div class="p-3">
      <div class="d-sm-flex justify-content-sm-between">
        <h1>Usuários</h1>

        <b-button
          variant="success"
          @click="$router.push(routes.CREATE_USER.path)"
        >
          Novo usuário
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
        :items="users"
        :fields="fields"
      >
        <template #head(id)>
          #
        </template>

        <template #head(name)>
          Nome
        </template>

        <template #head(created_at)>
          Cadastrado em
        </template>

        <template #head(action)>
          Ação
        </template>

        <template #cell(id)="data">
          #{{ data.value }}
        </template>

        <template #cell(name)="data">
          {{ data.value }}
        </template>

        <template #cell(email)="data">
          {{ data.value }}
        </template>

        <template #cell(created_at)="data">
          {{ data.value }}
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

import { onMounted } from 'vue'

import api from '@/services/api'

export default {
  name: 'DashboardPage',
  components: {
    TopBar
  },
  data(){
    return {
      userId: 0,
      routes,

      fields: ['id', 'name', 'email', 'created_at', 'action'],
      users: [
        /*
        {
          id: 1,
          name: 'User',
          email: 'email@gmail.com',
          created_at: new Date().toLocaleString(),
          action: {
            id: 1
          }
        },
        */
      ]
    }
  },
  mounted(){
    api.get('/admin/user/list')
      .then(response => {
        const { data } = response.data
        this.users = data.map(user => {
          user.action = {
            id: user.id
          }

          user.created_at = new Date(user.created_at).toLocaleString('pt-BR')

          return user
        })
      })
      .catch(error => {})
  },
  methods: {
    handleShowDeleteUserModal(userId) {
      this.userId = userId
    },
    async handleDeleteUser(userId) {
      await api.delete('/admin/user/' + userId)

      const index = this.users.map(item => item.id).indexOf(userId)

      this.users.splice(index, 1)
    }
  }
}


</script>
