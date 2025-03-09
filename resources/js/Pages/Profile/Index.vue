<script lang="ts">
import { defineComponent } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SpotifyIcon from '@/Icons/SpotifyIcon.vue';
import axios from 'axios';

export default defineComponent({
  name: 'Profile',
  components: {
    SpotifyIcon,
    PrimaryButton,
  },
  layout: (h, page) => h(AuthenticatedLayout, [page]),
  methods: {
    connectSpotify() {
      axios.get(route('profile.connect.spotify.index'));
    },
  },
  props: {
    socialAccounts: {
      required: true,
      type: Array,
    },
  },
});
</script>

<template>
  <div class="pl-12">
    <div class="flex flex-col gap-12">
      <div class="text-4xl font-semibold text-light-text">Integrations</div>
      <div class="flex w-full max-w-xl items-center gap-6">
        <SpotifyIcon class="h-12 w-12" />
        <div class="text-xl font-bold text-light-secondary">Spotify</div>
        <span
          v-if="socialAccounts.some((e) => e.provider === 'spotify')"
          class="ml-auto text-gray-500"
        >
          Connected
        </span>
        <PrimaryButton v-else class="ml-auto" @click="connectSpotify">
          Connect
        </PrimaryButton>
      </div>
    </div>
  </div>
</template>
