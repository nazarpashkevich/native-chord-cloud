<script lang="ts">
import { defineComponent, nextTick } from 'vue';
import PreviousIcon from '@/Icons/PreviousIcon.vue';
import PauseIcon from '@/Icons/PauseIcon.vue';
import NextIcon from '@/Icons/NextIcon.vue';
import VolumeIcon from '@/Icons/VolumeIcon.vue';
import ResumeIcon from '@/Icons/ResumeIcon.vue';
import { mapMutations, mapState } from 'vuex';

export default defineComponent({
  name: 'BottomPlayer',
  components: { ResumeIcon, VolumeIcon, NextIcon, PauseIcon, PreviousIcon },
  computed: {
    ...mapState('playerStore', [
      'volume',
      'isPlaying',
      'currentTime',
      'duration',
      'currentTrack',
    ]),
  },
  methods: {
    updateTime(): void {
      const audio = this.$refs.audio;
      if (audio) {
        this.setCurrentTime(audio.currentTime);
        this.setDuration(audio.duration);
      }
    },
    onEnded(): void {
      this.setIsPlaying(false);
      this.setCurrentTime(0);
    },
    togglePlayPause(): void {
      this.setIsPlaying(!this.isPlaying);
    },
    seek(event: Event): void {
      const audio = this.$refs.audio;
      audio.currentTime = event.target?.value;
      this.setCurrentTime(event.target?.value);
    },
    formatTime(seconds: number): string {
      const minutes = Math.floor(seconds / 60);
      const secs = Math.floor(seconds % 60)
        .toString()
        .padStart(2, '0');
      return `${minutes}:${secs}`;
    },

    changeVolume(event: Event): void {
      const audio = this.$refs.audio;
      audio.volume = event.target?.value;
      this.setVolume(audio.volume);
    },
    ...mapMutations('playerStore', [
      'setCurrentTime',
      'setVolume',
      'setIsPlaying',
      'setDuration',
    ]),
  },
  mounted() {
    const audio = this.$refs.audio;
    audio.volume = this.volume;

    nextTick(() => {
      audio.currentTime = this.currentTime;

      if (this.isPlaying) {
        audio.play();
      }
    });
  },
  watch: {
    isPlaying(newValue) {
      const audio = this.$refs.audio;
      if (newValue) {
        audio.play();
      } else {
        audio.pause();
      }
    },
    currentTrack(newValue) {
      this.$refs.audio.src = newValue.path;
      this.$refs.audio.load();
      this.$refs.audio.oncanplaythrough = () => {
        this.$refs.audio.play();
        this.setIsPlaying(true);
      };
    },
  },
});
</script>

<template>
  <div class="box- flex h-full w-full px-8 py-3">
    <div class="mr-6 flex gap-4">
      <audio
        ref="audio"
        :src="`file://${currentTrack.path}`"
        @timeupdate="updateTime"
        @ended="onEnded"
      ></audio>
      <div
        class="flex h-12 w-12 cursor-pointer rounded-full border-4 border-light-primary hover:backdrop-brightness-105"
      >
        <PreviousIcon class="m-auto text-light-primary" />
      </div>
      <div
        @click="togglePlayPause"
        class="flex h-12 w-12 cursor-pointer rounded-full border-4 border-light-primary hover:backdrop-brightness-105"
      >
        <PauseIcon v-if="isPlaying" class="m-auto text-light-primary" />
        <ResumeIcon v-else class="m-auto text-light-primary" />
      </div>
      <div
        class="flex h-12 w-12 cursor-pointer rounded-full border-4 border-light-primary hover:backdrop-brightness-105"
      >
        <NextIcon class="m-auto text-light-primary" />
      </div>
    </div>
    <div
      class="mr-2 flex w-full max-w-60 flex-col overflow-x-hidden whitespace-nowrap"
    >
      <span class="w-full animate-marquee text-lg font-medium">{{
        currentTrack.title
      }}</span>
      <span class="text-sm font-medium">{{ currentTrack.author }}</span>
    </div>
    <div class="relative my-auto flex w-full max-w-80 gap-2">
      <span class="text-xs">{{ formatTime(currentTime) }}</span>
      <input
        type="range"
        min="0"
        :max="duration"
        step="0.1"
        v-model="currentTime"
        @input="seek"
        class="my-auto h-1 w-full cursor-pointer appearance-none rounded-lg bg-gray-400 accent-light-primary"
      />
      <span class="text-xs">{{ formatTime(duration) }}</span>
    </div>

    <div class="my-auto ml-auto flex w-full max-w-32 gap-2">
      <VolumeIcon class="my-auto h-6 w-6" />
      <input
        type="range"
        min="0"
        max="1"
        step="0.01"
        v-model="volume"
        @input="changeVolume"
        class="my-auto h-1 w-full cursor-pointer appearance-none rounded-lg bg-gray-400 accent-light-primary"
      />
    </div>
  </div>
</template>
