<script lang="ts">
import { defineComponent } from 'vue';
import PlaylistCartItem from '@/Components/Playlist/PlaylistCartItem.vue';
import { PlaylistInterface } from '@/types/media';

export default defineComponent({
  name: 'PlaylistsList',
  components: { PlaylistCartItem },
  data: () => ({}),
  props: {
    title: {
      type: String,
      required: true,
    },
    playlists: {
      type: Array<PlaylistInterface>,
      required: true,
    },
  },
});
</script>

<template>
  <div class="text-4xl font-semibold text-light-text">{{ title }}</div>
  <div class="grid w-full grid-cols-5 gap-12">
    <template v-for="playlist in playlists" :key="playlist.id">
      <PlaylistCartItem :playlist="playlist" />
    </template>
  </div>
</template>

<style scoped></style>
