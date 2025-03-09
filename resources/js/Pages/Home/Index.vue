<script lang="ts">
import { defineComponent } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PlaylistsList from '@/Pages/Home/Partials/PlaylistsList.vue';
import AllTracks from '@/Pages/Home/Partials/AllTracks.vue';

export default defineComponent({
  name: 'HomePage',
  components: {
    PlaylistsList,
    AllTracks,
  },
  layout: (h, page) => h(AuthenticatedLayout, [page]),
  props: {
    all_tracks: {
      type: Object as Record<string, any>,
      required: true,
    },
    spotify_playlists: {
      type: Object as Record<string, any>,
      required: true,
    },
  },
});
</script>

<template>
  <div class="pl-12">
    <div class="flex flex-col gap-12">
      <PlaylistsList
        :playlists="spotify_playlists"
        title="Just Directly from Spotify"
      />
      <AllTracks :tracks="all_tracks" />
    </div>
  </div>
</template>
