<script lang="ts">
import { defineComponent, nextTick } from 'vue'
import PreviousIcon from "@/Icons/PreviousIcon.vue";
import PauseIcon from "@/Icons/PauseIcon.vue";
import NextIcon from "@/Icons/NextIcon.vue";
import VolumeIcon from "@/Icons/VolumeIcon.vue";
import ResumeIcon from "@/Icons/ResumeIcon.vue";
import { mapMutations, mapState } from "vuex";

export default defineComponent({
    name: "BottomPlayer",
    components: { ResumeIcon, VolumeIcon, NextIcon, PauseIcon, PreviousIcon },
    computed: {
        ...mapState("playerStore", ["volume", "isPlaying", "currentTime", "duration"]),
    },
    methods: {
        updateTime() {
            const audio = this.$refs.audio;
            if (audio) {
                this.setCurrentTime(audio.currentTime);
                this.setDuration(audio.duration);
            }
        },
        onEnded() {
            this.setIsPlaying(false);
            this.setCurrentTime(0);
        },
        togglePlayPause() {
            const audio = this.$refs.audio;
            if (audio.paused) {
                audio.play();
                this.setIsPlaying(true);
            } else {
                audio.pause();
                this.setIsPlaying(false);
            }
        },
        seek(event) {
            const audio = this.$refs.audio;
            audio.currentTime = event.target.value;
            this.setCurrentTime(event.target.value);
        },
        formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60).toString().padStart(2, '0');
            return `${minutes}:${secs}`;
        },
        changeVolume(event) {
            const audio = this.$refs.audio;
            audio.volume = event.target.value;
            this.setVolume(audio.volume);
        },
        ...mapMutations('playerStore', ['setCurrentTime', 'setVolume', 'setIsPlaying', 'setDuration']),
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
})
</script>

<template>
    <div class="flex w-full h-full px-8 py-3">
        <div class="flex gap-4 mr-12">
            <audio ref="audio"
                   src="file:\/\/home\/nazar\/Metallica.mp3"
                   @timeupdate="updateTime"
                   @ended="onEnded"></audio>
            <div
                class="rounded-full border-4 border-light-primary w-10 flex cursor-pointer hover:backdrop-brightness-105">
                <PreviousIcon class="text-light-primary m-auto"/>
            </div>
            <div
                @click="togglePlayPause"
                class="rounded-full border-4 border-light-primary w-10 flex cursor-pointer hover:backdrop-brightness-105">
                <PauseIcon v-if="isPlaying" class="text-light-primary m-auto"/>
                <ResumeIcon v-else class="text-light-primary m-auto"/>
            </div>
            <div
                class="rounded-full border-4 border-light-primary w-10 flex cursor-pointer hover:backdrop-brightness-105">
                <NextIcon class="text-light-primary m-auto"/>
            </div>
        </div>
        <div class="max-w-60 w-full flex flex-col">
            <span class="font-medium text-lg">Some Text title</span>
            <span class="font-medium text-sm">Some songer</span>
        </div>
        <div class="my-auto max-w-80 w-full relative flex gap-2">
            <span class="text-xs">{{ formatTime(currentTime) }}</span>
            <input
                type="range"
                min="0"
                :max="duration"
                step="0.1"
                v-model="currentTime"
                @input="seek"
                class="w-full h-1 bg-gray-400 rounded-lg appearance-none cursor-pointer accent-light-primary my-auto"
            />
            <span class="text-xs">{{ formatTime(duration) }}</span>
        </div>

        <div class="ml-auto my-auto max-w-32 w-full flex gap-2">
            <VolumeIcon class="my-auto w-6 h-6"/>
            <input
                type="range"
                min="0"
                max="1"
                step="0.01"
                v-model="volume"
                @input="changeVolume"
                class="w-full h-1 bg-gray-400 rounded-lg appearance-none cursor-pointer accent-light-primary my-auto"
            />
        </div>
    </div>
</template>
