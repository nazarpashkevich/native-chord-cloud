<script lang="ts">
import { defineComponent } from 'vue';
import MediaIcon from '@/Icons/MediaIcon.vue';
import NavPlaylistItem from '@/Layouts/Partials/NavPlaylistItem.vue';

export default defineComponent({
  name: 'NavBar',
  components: { NavPlaylistItem, MediaIcon },
  data: () => ({
    extended: false,
    playlists: [
      {
        image:
          'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s',
        title: 'Just for you #1',
      },
      {
        image:
          'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s',
        title: 'Just for you #1',
      },
      {
        image:
          'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s',
        title: 'Just for you #1',
      },
      {
        image:
          'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s',
        title: 'Just for you #1',
      },
    ],
  }),
  computed: {
    width() {
      return this.extended ? 'w-64' : 'w-10';
    },
  },
});
</script>

<template>
  <div :class="[width]" class="py-8 transition-all duration-150">
    <div
      class="my-auto mb-12 flex h-8 w-8 cursor-pointer duration-100 hover:-translate-y-1 hover:scale-110"
      @click="extended = !extended"
    >
      <MediaIcon class="m-auto text-light-primary" />
    </div>
    <div class="flex flex-col divide-y divide-light-primary">
      <template v-for="playlist in playlists">
        <NavPlaylistItem
          :extended="extended"
          :picture="playlist.image"
          :title="playlist.title"
        />
      </template>
    </div>
  </div>
</template>

<style scoped></style>
