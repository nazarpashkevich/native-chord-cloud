<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: "TableHeaderColumn",
    props: {
        name: {
            type: String,
            required: true
        }
    }
})
</script>

<template>
    <th class="p-4 border-b border-blue-gray-100 bg-light-primary">
        <p class="block font-sans text-sm antialiased font-semibold leading-none text-white opacity-70">
            {{ name }}
        </p>
    </th>
</template>

<style scoped>

</style>
