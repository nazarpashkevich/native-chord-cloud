<script lang="ts">
import { defineComponent } from 'vue'
import PlaylistCartItem from "@/Components/Playlist/PlaylistCartItem.vue";

export default defineComponent({
    name: "JustForYou",
    components: { PlaylistCartItem },
    data: () => ({
        items: [
            {
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s",
                title: "Just for you #1",
                description: "Singer 1, Singer 2, Singer 3"
            },
            {
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s",
                title: "Just for you #1",
                description: "Singer 1, Singer 2, Singer 3"
            },
            {
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s",
                title: "Just for you #1",
                description: "Singer 1, Singer 2, Singer 3"
            },
            {
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnnFf6DXcgRxe71BOQm1orHpnKjJloo9c2jg&s",
                title: "Just for you #1",
                description: "Singer 1, Singer 2, Singer 3"
            }
        ]
    })
})
</script>

<template>
    <div class="text-4xl font-semibold text-light-text">
        Only for you
    </div>
    <div class="w-full grid grid-cols-4 gap-12">
        <template v-for="item in items">
            <PlaylistCartItem :title="item.title" :description="item.description" :picture="item.image"/>
        </template>
    </div>
</template>

<style scoped>

</style>
