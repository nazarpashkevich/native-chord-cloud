<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: "WindowControl",
})
</script>

<template>
    <div class="px-4 cursor-pointer rounded-md flex hover:bg-light-surface hover:text-white text-slate-500">
        <slot/>
    </div>
</template>

<style scoped>

</style>
