<script lang="ts">
import { defineComponent } from 'vue'
import PreviousIcon from "@/Icons/PreviousIcon.vue";
import PauseIcon from "@/Icons/PauseIcon.vue";
import NextIcon from "@/Icons/NextIcon.vue";
import VolumeIcon from "@/Icons/VolumeIcon.vue";

export default defineComponent({
    name: "BottomPlayer",
    components: { VolumeIcon, NextIcon, PauseIcon, PreviousIcon }
})
</script>

<template>
    <div class="flex w-full h-full px-8 py-3">
        <div class="flex gap-4 mr-12">
            <div
                class="rounded-full border-4 border-light-primary w-10 flex cursor-pointer hover:backdrop-brightness-105">
                <PreviousIcon class="text-light-primary m-auto"/>
            </div>
            <div
                class="rounded-full border-4 border-light-primary w-10 flex cursor-pointer hover:backdrop-brightness-105">
                <PauseIcon class="text-light-primary m-auto"/>
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
            <span class="text-xs">00:00</span>
            <input
                type="range"
                min="0"
                max="100"
                value="50"
                class="w-full h-1 bg-gray-400 rounded-lg appearance-none cursor-pointer accent-light-primary my-auto"
            />
            <span class="text-xs">-03:45</span>
        </div>

        <div class="ml-auto my-auto max-w-32 w-full flex gap-2">
            <VolumeIcon class="my-auto w-6 h-6"/>
            <input
                type="range"
                min="0"
                max="100"
                value="50"
                class="w-full h-1 bg-gray-400 rounded-lg appearance-none cursor-pointer accent-light-primary my-auto"
            />
        </div>
    </div>
</template>

<style scoped>

</style>
