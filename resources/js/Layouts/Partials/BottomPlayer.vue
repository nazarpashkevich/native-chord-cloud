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
        ...mapState("playerStore", ["volume", "isPlaying", "currentTime", "duration", "currentTrack"]),
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
            audio.currentTime = event.target.value;
            this.setCurrentTime(event.target.value);
        },
        formatTime(seconds: number): string {
            const minutes = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60).toString().padStart(2, '0');
            return `${minutes}:${secs}`;
        },
        changeVolume(event: Event): void {
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
})
</script>

<template>
    <div class="flex w-full h-full px-8 py-3 box-">
        <div class="flex gap-4 mr-6">
            <audio ref="audio"
                   :src="`file://${encodeURI(currentTrack.path)}`"
                   @timeupdate="updateTime"
                   @ended="onEnded"></audio>
            <div
                class="rounded-full border-4 border-light-primary h-12 w-12 flex cursor-pointer hover:backdrop-brightness-105">
                <PreviousIcon class="text-light-primary m-auto"/>
            </div>
            <div
                @click="togglePlayPause"
                class="rounded-full border-4 border-light-primary h-12 w-12 flex cursor-pointer hover:backdrop-brightness-105">
                <PauseIcon v-if="isPlaying" class="text-light-primary m-auto"/>
                <ResumeIcon v-else class="text-light-primary m-auto"/>
            </div>
            <div
                class="rounded-full border-4 border-light-primary h-12 w-12 flex cursor-pointer hover:backdrop-brightness-105">
                <NextIcon class="text-light-primary m-auto"/>
            </div>
        </div>
        <div class="max-w-60 w-full flex flex-col mr-2 whitespace-nowrap overflow-x-hidden">
            <span class="font-medium text-lg w-full animate-marquee">{{ currentTrack.title }}</span>
            <span class="font-medium text-sm">{{ currentTrack.author }}</span>
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
