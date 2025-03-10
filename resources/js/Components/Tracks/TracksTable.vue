<script lang="ts">
import { defineComponent } from 'vue';
import MainTable from '@/Components/Table/MainTable.vue';
import { mapMutations } from 'vuex';
import { TrackInterface } from '@/types/media';

export default defineComponent({
  name: 'TracksTable',
  components: { MainTable },
  props: {
    items: {
      type: Array,
      required: true,
    },
  },
  data: () => ({
    headers: [
      {
        title: '#',
        field: 'id',
      },
      {
        title: 'Name',
        field: 'title',
      },
      {
        title: 'Album',
        field: 'album',
      },
      {
        title: 'T',
        field: 'playtime_formatted',
      },
    ],
  }),

  methods: {
    playTrack(track: TrackInterface): void {
      this.setCurrentTrack(track);
    },
    ...mapMutations('playerStore', [
      'setCurrentTrack',
      'setIsPlaying',
      'setCurrentTime',
    ]),
  },
});
</script>

<template>
  <div
    class="relative flex flex-col overflow-y-scroll rounded-xl bg-white bg-clip-border text-gray-700 shadow-md"
  >
    <MainTable :headers="headers" :items="items" @row-action="playTrack" />
  </div>
</template>
