<script setup lang="ts"></script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-secondary pt-6 sm:justify-center sm:pt-0 dark:bg-gray-900"
    >
        <div
            class="mt-6 w-full overflow-hidden px-6 py-4 bg-slate-50 text-gray-500 shadow-md sm:max-w-md sm:rounded-lg
             dark:bg-gray-800"
        >
            <slot/>
        </div>
    </div>
</template>
