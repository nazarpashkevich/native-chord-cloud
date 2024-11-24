<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import JustForYou from "@/Pages/Home/Partials/JustForYou.vue";

defineProps<{
    mustVerifyEmail?: boolean;
    status?: string;
}>();
</script>

<template>
    <Head title="Profile"/>

    <AuthenticatedLayout>
        <div class="pl-12">
            <div class="flex flex-col gap-12">
                <JustForYou/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
