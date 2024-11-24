<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: "NavPlaylistItem",
    components: {},
    props: {
        picture: {
            type: String,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        extended: {
            type: Boolean,
            default: false
        }
    }
})
</script>

<template>
    <div class="flex gap-4 py-4 cursor-pointer hover:backdrop-brightness-105 px-1">
        <div class="relative">
            <div
                class="hover:-translate-y-1 hover:scale-110 duration-100 cursor-pointer flex my-auto bg-cover
             transition-all"
                :class="[extended ? 'w-16 h-16' : 'w-8 h-8']"
                :style="{backgroundImage: `url('${picture}')`}">
            </div>
            <div v-if="!extended" class="absolute inset-0 bg-black opacity-30"></div>
        </div>
        <div v-if="extended" class="font-semibold text-lg text-light-text">{{ title }}</div>
    </div>
</template>

<style scoped>

</style>
