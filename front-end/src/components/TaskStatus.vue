<template>
  <div>
    <p
      v-if="status === 'pending'"
      class="p-1 text-warning"
    >
      Pendente
    </p>

    <p
      v-else-if="status === 'done'"
      class="p-1 text-success"
    >
      Finalizado
    </p>
  </div>
</template>

<script>

export default {
  name: 'TaskStatus',
  props: {
    status: {
      type: String,
      default: 'pending'
    }
  }
}
</script>
