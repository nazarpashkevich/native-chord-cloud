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
    <tr class="hover:bg-light-surface-attended cursor-pointer"
        :class="[item.isActive ? 'bg-light-surface-active' : 'bg-light-surface']">
        <template v-for="header in headers">
            <td class="p-4 border-b border-light-background">
                <p class="block font-sans text-sm text-blue-gray-900">
                    {{ item[header.field] }}
                </p>
            </td>
        </template>
    </tr>
</template>

<style scoped>

</style>
