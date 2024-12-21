<script lang="ts">
import { defineComponent } from 'vue'
import MainTable from "@/Components/Table/MainTable.vue";

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
                field: 'playtime'
            },
        ],
    })
})
</script>

<template>
    <div
        class="relative flex flex-col overflow-y-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
        <MainTable :items="items" :headers="headers"/>
    </div>
</template>

<style scoped>

</style>
