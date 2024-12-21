<script lang="ts">
import { defineComponent } from 'vue'
import MainTable from "@/Components/Table/MainTable.vue";
import { mapMutations } from "vuex";

export default defineComponent({
    name: "TracksTable",
    components: { MainTable },
    props: {
        items: {
            type: Array,
            required: true
        },
    },
    data: () => ({
        headers: [
            {
                title: '#',
                field: 'id'
            },
            {
                title: 'Name',
                field: 'title'
            },
            {
                title: 'Album',
                field: 'album'
            },
            {
                title: 'T',
                field: 'playtime_formatted'
            },
        ],
    }),
    methods: {
        playTrack(track): void {
            this.setCurrentTrack(track);
        },
        ...mapMutations('playerStore', ['setCurrentTrack', 'setIsPlaying', 'setCurrentTime']),
    }
})
</script>

<template>
    <div
        class="relative flex flex-col overflow-y-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
        <MainTable :items="items" :headers="headers" @row-action="playTrack"/>
    </div>
</template>
