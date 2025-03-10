<script lang="ts">
import { defineComponent } from 'vue';
import TrackService from '@/services/track.service';
import PrimaryButton from '@/Components/PrimaryButton.vue';

export default defineComponent({
  name: 'UploadFileButton',
  components: { PrimaryButton },
  props: {
    playlistId: {
      type: Number,
      required: false,
    },
  },
  methods: {
    addNewTrack() {
      const fileInput = this.$refs.fileInput as HTMLInputElement;
      if (fileInput) {
        fileInput.click();
      }
    },
    onFileUploaded(e: Event) {
      const target = e.target as HTMLInputElement;
      if (target?.files?.[0]) {
        TrackService.uploadTrack(target.files[0], this.playlistId ?? null);
      }
    },
  },
});
</script>

<template>
  <PrimaryButton @click="addNewTrack"> Add new </PrimaryButton>
  <input ref="fileInput" class="hidden" type="file" @change="onFileUploaded" />
</template>
