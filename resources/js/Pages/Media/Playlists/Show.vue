<script lang="ts">
import { defineComponent, PropType } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { PlaylistInterface, TrackInterface } from '@/types/media';
import TracksTable from '@/Components/Tracks/TracksTable.vue';
import CreatePlaylistModal from '@/Components/Playlist/CreatePlaylistModal.vue';
import UploadFileButton from '@/Components/Tracks/UploadFileButton.vue';

export default defineComponent({
  name: 'HomePage',
  computed: {
    CreatePlaylistModal() {
      return CreatePlaylistModal;
    },
  },
  components: {
    UploadFileButton,
    TracksTable,
  },
  layout: (h, page) => h(AuthenticatedLayout, [page]),
  props: {
    tracks: {
      type: Array<TrackInterface>,
      required: true,
    },
    playlist: {
      type: Object as PropType<PlaylistInterface>,
      required: true,
    },
  },
});
</script>

<template>
  <div class="pl-12">
    <div class="flex flex-col gap-12">
      <div class="flex">
        <div class="text-4xl font-semibold text-light-text">
          {{ playlist.title }}
        </div>
        <div class="ml-auto">
          <UploadFileButton :playlist-id="Number.parseInt(playlist.id)" />
        </div>
      </div>
      <TracksTable :items="tracks" />
    </div>
  </div>
</template>
