<script lang="ts">
import { defineComponent } from 'vue'
import { Link } from "@inertiajs/vue3";
import MediaIcon from "@/Icons/MediaIcon.vue";
import NavPlaylistItem from "@/Layouts/Partials/NavPlaylistItem.vue";

export default defineComponent({
    name: "NavBar",
    components: { NavPlaylistItem, MediaIcon, Link },
    data: () => ({
        extended: false,
        playlists: [
            {
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s",
                title: "Just for you #1",
            },
            {
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s",
                title: "Just for you #1",
            },
            {
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s",
                title: "Just for you #1",
            },
            {
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s",
                title: "Just for you #1",
            }
        ]
    }),
    computed: {
        width() {
            return this.extended ? 'w-64' : 'w-10';
        }
    }
})
</script>

<template>
    <div class="py-8 transition-all duration-150" :class="[width]">
        <div @click="extended = !extended"
             class="w-8 h-8 hover:-translate-y-1 hover:scale-110 duration-100 cursor-pointer flex my-auto mb-12">
            <MediaIcon class="m-auto text-light-primary"/>
        </div>
        <div class="flex flex-col divide-y divide-light-primary">
            <template v-for="playlist in playlists">
                <NavPlaylistItem
                    :title="playlist.title"
                    :picture="playlist.image"
                    :extended="extended"
                />
            </template>
        </div>
    </div>
</template>

<style scoped>

</style>
