<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: "TableRow",
    props: {
        item: {
            type: Object,
            required: true
        },
        headers: {
            type: Array,
            required: true
        }
    }
})
</script>

<template>
    <tr class="bg-light-surface hover:backdrop-brightness-105 cursor-pointer">
        <template v-for="header in headers">
            <td class="p-4 border-b border-blue-gray-50">
                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                    {{ item[header.field] }}
                </p>
            </td>
        </template>
    </tr>
</template>

<style scoped>

</style>
