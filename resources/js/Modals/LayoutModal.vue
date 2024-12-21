<script lang="ts">
import { defineComponent } from 'vue'
import { VueFinalModal } from "vue-final-modal";

export default defineComponent({
    name: "LayoutModal",
    components: { VueFinalModal },
    props: {
        title: {
            type: String,
        }
    }
})
</script>

<template>
    <VueFinalModal overlay-transition="vfm-fade" content-transition="vfm-fade">
        <div class="flex m-auto bg-white absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 py-4 px-6
            rounded-md shadow-lg">
            <slot/>
        </div>
    </VueFinalModal>
</template>

<style scoped>

</style>
