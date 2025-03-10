<script lang="ts">
import { defineComponent } from 'vue';
import TableHeaderColumn from '@/Components/Table/TableHeaderColumn.vue';
import TableRow from '@/Components/Table/TableRow.vue';
import { mapState } from 'vuex';
import { TrackInterface } from '@/types/media';

export default defineComponent({
  name: 'MainTable',
  components: { TableRow, TableHeaderColumn },
  computed: {
    ...mapState('playerStore', ['trackSrc']),
  },
  props: {
    headers: {
      type: Array<{ title: string; field: string }>,
      required: true,
    },
    items: {
      type: Array<TrackInterface>,
      required: true,
    },
  },
  emits: ['rowAction'],
});
</script>

<template>
  <template v-if="items?.length">
    <table class="min-w-max table-auto text-left">
      <thead>
        <tr>
          <template v-for="(header, index) in headers" :key="index">
            <TableHeaderColumn :name="header.title" />
          </template>
        </tr>
      </thead>
      <tbody>
        <template v-for="item in items" :key="item.id">
          <TableRow
            :headers="headers"
            :item="{ ...item, isActive: item.path === trackSrc }"
            @click="$emit('rowAction', item)"
          />
        </template>
      </tbody>
    </table>
  </template>
  <div
    v-else
    class="bg-light-surface-active py-2 text-center text-light-text-secondary"
  >
    Nothing here yet!
  </div>
</template>
