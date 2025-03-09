<script lang="ts">
import { defineComponent } from 'vue'
import UserControlItem from "./UserControlItem.vue";

export default defineComponent({
    name: "UserControl",
    components: { UserControlItem },
    data: () => ({
        showItems: false,
        subItems: [
            {
                title: "Profile",
                href: route("profile.index"),
            },
            {
                title: "Go to Premium",
                href: "/",
            },
            {
                title: "Settings",
                href: "/",
            },
            {
                title: "Logout",
                href: "/",
            }
        ]
    })
})
</script>

<template>
    <div class="relative flex" v-click-outside="() => showItems = false">
        <div
            @click="showItems = !showItems"
            class="w-10 h-10 rounded-full bg-light-primary hover:-translate-y-1 hover:scale-110 duration-100
             cursor-pointer flex text-white my-auto">
            <span class="m-auto">N</span>
        </div>
        <div
            v-if="showItems"
            class="bg-light-primary w-48 top-14 left-6 absolute rounded-md divide-y divide-slate-300 flex flex-col
                z-40">
            <template v-for="item in subItems">
                <UserControlItem :title="item.title" :href="item.href"/>
            </template>
        </div>
    </div>
</template>

<style scoped>

</style>
