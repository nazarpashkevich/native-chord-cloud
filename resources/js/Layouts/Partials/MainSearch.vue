<script lang="ts">
import { defineComponent } from 'vue'
import SearchIcon from "@/Icons/SearchIcon.vue";

export default defineComponent({
    name: "MainSearch",
    components: { SearchIcon },
    data: () => ({
        active: false
    })
})
</script>

<template>
    <div class="relative ">
        <input class="w-full  bg-light-surface pl-12" :class="[active ? 'rounded-t-lg': 'rounded-lg']"
               placeholder="Search"
               @focus="active = true"
               @focusout="active = false">
        <SearchIcon class="w-6 h-6 absolute top-1/2 left-2 -translate-y-1/2 text-slate-500"/>
        <div
            v-if="active"
            class="absolute w-full t-12 border border-primary bg-light-surface rounded-b-md flex flex-col
            divide-y divide-slate-300">
            <div class="pl-4 py-3 text-white font-medium hover:backdrop-brightness-105">
                item 1
            </div>
            <div class="pl-4 py-3 text-white font-medium hover:backdrop-brightness-105">
                item 1
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
