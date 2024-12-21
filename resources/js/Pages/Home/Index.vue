<script lang="ts">
import { defineComponent } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import JustForYou from "@/Pages/Home/Partials/JustForYou.vue";
import AllTracks from "@/Pages/Home/Partials/AllTracks.vue";

export default defineComponent({
    name: "HomePage",
    components: {
        AuthenticatedLayout,
        Head,
        JustForYou,
        AllTracks,
    },
    layout: (h, page) => h(AuthenticatedLayout, [page]),
    props: {
        all_tracks: {
            type: Array,
            required: true
        }
    }
});
</script>

<template>
    <div class="pl-12">
        <div class="flex flex-col gap-12">
            <JustForYou/>
            <AllTracks :tracks="all_tracks"/>
        </div>
    </div>
</template>

