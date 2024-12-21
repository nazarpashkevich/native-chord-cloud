<script lang="ts">
import { defineComponent } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link, usePage } from '@inertiajs/vue3';
import CrossIcon from "@/Icons/CrossIcon.vue";
import ResizeIcon from "@/Icons/ResizeIcon.vue";
import CollapseIcon from "@/Icons/CollapseIcon.vue";
import WindowControl from "./Partials/WindowControl.vue";
import HomeIcon from "@/Icons/HomeIcon.vue";
import MainSearch from "./Partials/MainSearch.vue";
import UserControl from "./Partials/UserControl.vue";
import MediaIcon from "@/Icons/MediaIcon.vue";
import NavBar from "@/Layouts/Partials/NavBar.vue";
import BottomPlayer from "@/Layouts/Partials/BottomPlayer.vue";
import { ModalsContainer } from "vue-final-modal";

export default defineComponent({
    name: 'AuthenticatedLayout',
    components: {
        ModalsContainer,
        BottomPlayer,
        NavBar,
        MediaIcon,
        ApplicationLogo,
        Link,
        CrossIcon,
        ResizeIcon,
        CollapseIcon,
        WindowControl,
        HomeIcon,
        MainSearch,
        UserControl,
    },
    data: () => ({
        isMaximized: false,
    }),
    mounted() {
        const page = usePage();

        this.isMaximized = !!page.props.window.maximized;
    },
});
</script>
<template>
    <div>
        <div class="min-h-screen bg-light-background dark:bg-gray-900">
            <nav
                class="border-b border-gray-200 bg-light-background dark:border-gray-700 dark:bg-gray-800"
            >
                <div class="mx-auto pl-4 sm:pl-6 lg:pl-8">
                    <div class="flex h-16 justify-between relative drag">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex shrink-0 items-center">
                                <ApplicationLogo
                                    class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                                />
                            </div>

                            <!-- Navigation Links -->
                            <div class="relative mx-12 flex no-drag">
                                <Link :href="route('home.index')"
                                      class="w-10 h-10 rounded-full border-light-primary border hover:-translate-y-1
                                    hover:scale-110 duration-100 cursor-pointer flex my-auto">
                                    <HomeIcon class="m-auto text-light-primary"/>
                                </Link>
                            </div>
                        </div>

                        <MainSearch class="mx-auto py-3 max-w-md w-full no-drag"/>

                        <UserControl class="mx-12 no-drag"/>


                        <!-- Window controls -->
                        <div class="mx-2 flex h-full py-2 no-drag">
                            <WindowControl>
                                <Link :href="route('home.minimize')" class="m-auto">
                                    <CollapseIcon class="w-4 h-4"/>
                                </Link>
                            </WindowControl>
                            <WindowControl>
                                <Link v-if="isMaximized" :href="route('home.un-maximize')" class="m-auto">
                                    <ResizeIcon class="w-4 h-4"/>
                                </Link>
                                <Link v-else :href="route('home.maximize')" class="m-auto">
                                    <ResizeIcon class="w-4 h-4"/>
                                </Link>
                            </WindowControl>
                            <WindowControl class="hover:bg-red-700">
                                <Link :href="route('home.close')" class="m-auto">
                                    <CrossIcon class="w-4 h-4"/>
                                </Link>
                            </WindowControl>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                <div class="py-12 px-4 grid gap-4 grid-cols-[auto,1fr] min-h-[calc(100vh-8.05rem)] divide-x">
                    <NavBar/>
                    <div class="px-4">
                        <slot/>
                    </div>
                </div>

                <div class="flex w-full sticky bottom-0">
                    <div class="bg-light-surface border border-light-primary w-full rounded-t-md max-w-5xl mx-auto">
                        <keep-alive>
                            <BottomPlayer key="fixed-key"/>
                        </keep-alive>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <ModalsContainer/>
</template>
