<script lang="ts">
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/vue3';

export default defineComponent({
    name: "UserControlItem",
    components: { Link },
    props: {
        title: {
            type: String,
            required: true
        },
        href: {
            type: String,
            required: true
        }
    }
})
</script>

<template>
    <Link :href="href" class="py-4 px-6 font-medium text-white hover:backdrop-brightness-105 cursor-pointer">
        {{ title }}
    </Link>
</template>

<style scoped>

</style>
