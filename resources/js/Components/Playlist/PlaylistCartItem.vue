<script lang="ts">
import { defineComponent, PropType } from 'vue';
import { PlaylistInterface } from '@/types/media';
import { router } from '@inertiajs/vue3';

export default defineComponent({
  name: 'PlaylistCartItem',
  computed: {
    image() {
      // @todo move to config
      return this.playlist.image?.length
        ? this.playlist.image
        : '/images/media/playlist/placeholder.png';
    },
  },
  props: {
    playlist: {
      type: Object as PropType<PlaylistInterface>,
      required: true,
    },
  },
  methods: {
    router() {
      return router;
    },
    hrefPlaylist(playlist: PlaylistInterface): string {
      return route(`${playlist.provider}.playlist.show`, playlist.id);
    },
  },
});
</script>

<template>
  <div
    class="flex cursor-pointer flex-col gap-6 rounded-md border border-light-primary bg-light-surface px-4 py-6 hover:backdrop-brightness-105"
    @click="router().visit(hrefPlaylist(playlist))"
  >
    <div class="relative">
      <div
        :style="{ backgroundImage: `url('${image}')` }"
        class="h-48 rounded-md bg-cover"
      ></div>
      <div class="absolute inset-0 bg-black opacity-30"></div>
    </div>
    <div>
      <div class="text-xl font-medium text-light-text">
        {{ playlist.title }}
      </div>
      <div class="text-xs font-medium text-light-text">
        {{ playlist.description }}
      </div>
    </div>
  </div>
</template>
