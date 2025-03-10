<script lang="ts">
import { defineComponent } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import AllTracks from '@/Pages/Home/Partials/AllTracks.vue';
import PlaylistsList from '@/Components/Playlist/PlaylistsList.vue';
import CreatePlaylistModal from '@/Components/Playlist/CreatePlaylistModal.vue';
import OpenModalButton from '@/Components/UI/OpenModalButton.vue';

export default defineComponent({
  name: 'HomePage',
  computed: {
    CreatePlaylistModal() {
      return CreatePlaylistModal;
    },
  },
  components: {
    PlaylistsList,
    AllTracks,
    OpenModalButton,
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
    internal_playlists: {
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

      <PlaylistsList :playlists="internal_playlists" title="Your playlists">
        <template #actions>
          <OpenModalButton :modal-component="CreatePlaylistModal" title="Add" />
        </template>
      </PlaylistsList>
    </div>
  </div>
</template>
