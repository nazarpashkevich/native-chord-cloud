<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: "PlaylistCartItem",
    props: {
        picture: {
            type: String,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        description: {
            type: String,
            required: true
        }
    }
})
</script>

<template>
    <div class="border-light-primary border rounded-md py-6 px-4 flex flex-col gap-6 bg-light-surface
                        cursor-pointer hover:backdrop-brightness-105">
        <div class="relative">
            <div class="bg-cover h-48 rounded-md"
                 :style="{backgroundImage: `url('${picture}')`}"></div>
            <div class="absolute inset-0 bg-black opacity-30"></div>
        </div>
        <div>
            <div class="font-medium text-xl text-light-text">{{ title }}</div>
            <div class="font-medium text-xs text-light-text">{{ description }}</div>
        </div>
    </div>
</template>

<style scoped>

</style>
