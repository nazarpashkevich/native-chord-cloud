<script lang="ts">
import { defineComponent } from 'vue';
import TracksTable from '@/Components/Tracks/TracksTable.vue';
import UploadFileButton from '@/Components/Tracks/UploadFileButton.vue';

export default defineComponent({
  name: 'AllTracks',
  components: { UploadFileButton, TracksTable },
  props: {
    tracks: {
      type: Object,
      required: true,
    },
  },
});
</script>

<template>
  <div class="flex">
    <div class="text-4xl font-semibold text-light-text">
      Local library tracks
    </div>
    <div class="ml-auto">
      <UploadFileButton />
    </div>
  </div>
  <TracksTable :items="tracks.data" />
</template>
