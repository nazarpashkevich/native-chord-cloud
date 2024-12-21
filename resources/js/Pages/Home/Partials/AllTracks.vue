<script lang="ts">
import { defineComponent } from 'vue'
import TracksTable from "@/Components/Tracks/TracksTable.vue";
import { TrackService } from "@/services/track.service";

export default defineComponent({
    name: "AllTracks",
    components: { TracksTable },
    methods: {
        addNewTrack() {
            this.$refs.fileInput.click();
        },
        onFileUploaded(e) {
            TrackService.make().uploadTrack(e.target.files[0]);
        }
    },
    props: {
        tracks: {
            type: Object,
            required: true
        }
    }
})
</script>

<template>
    <div class="flex">
        <div class="text-4xl font-semibold text-light-text">
            All Tracks
        </div>
        <div class="ml-auto">
            <button
                @click="addNewTrack"
                class="px-4 py-2 text-white bg-light-primary border-slate-600 border rounded-md hover:bg-light-surface">
                Add new
            </button>
            <input type="file" class="hidden" ref="fileInput" @change="onFileUploaded"/>
        </div>
    </div>
    <TracksTable :items="tracks.data"/>
</template>

<style scoped>

</style>
