<script lang="ts">
import { defineComponent } from 'vue'
import { VueFinalModal } from "vue-final-modal";
import Modal from "@/Modals/LayoutModal.vue";
import LayoutModal from "@/Modals/LayoutModal.vue";

export default defineComponent({
    name: "AddNewTrackModal",
    components: { LayoutModal, Modal, VueFinalModal },
    props: {
        title: {
            type: String,
        }
    }
})
</script>

<template>
    <LayoutModal>
        <h1>{{ title }}</h1>
        <slot/>
        <button @click="emit('confirm')">
            Confirm
        </button>
    </LayoutModal>
</template>

<style scoped>

</style>
