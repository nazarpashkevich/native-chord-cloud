<script lang="ts">
import { defineComponent } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link, usePage } from '@inertiajs/vue3';
import CrossIcon from '@/Icons/CrossIcon.vue';
import ResizeIcon from '@/Icons/ResizeIcon.vue';
import CollapseIcon from '@/Icons/CollapseIcon.vue';
import WindowControl from './Partials/WindowControl.vue';
import HomeIcon from '@/Icons/HomeIcon.vue';
import MainSearch from './Partials/MainSearch.vue';
import UserControl from './Partials/UserControl.vue';
import MediaIcon from '@/Icons/MediaIcon.vue';
import NavBar from '@/Layouts/Partials/NavBar.vue';
import BottomPlayer from '@/Layouts/Partials/BottomPlayer.vue';
import { ModalsContainer } from 'vue-final-modal';

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
        class="sticky top-0 z-40 border-b border-gray-200 bg-light-background dark:border-gray-700 dark:bg-gray-800"
      >
        <div class="mx-auto pl-4 sm:pl-6 lg:pl-8">
          <div class="drag relative flex h-16 justify-between">
            <div class="flex">
              <!-- Logo -->
              <div class="flex shrink-0 items-center">
                <ApplicationLogo
                  class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                />
              </div>

              <!-- Navigation Links -->
              <div class="no-drag relative mx-12 flex">
                <Link
                  :href="route('home.index')"
                  class="my-auto flex h-10 w-10 cursor-pointer rounded-full border border-light-primary duration-100 hover:-translate-y-1 hover:scale-110"
                >
                  <HomeIcon class="m-auto text-light-primary" />
                </Link>
              </div>
            </div>

            <MainSearch class="no-drag mx-auto w-full max-w-md py-3" />

            <UserControl class="no-drag mx-12" />

            <!-- Window controls -->
            <div class="no-drag mx-2 flex h-full py-2">
              <WindowControl>
                <Link :href="route('home.minimize')" class="m-auto">
                  <CollapseIcon class="h-4 w-4" />
                </Link>
              </WindowControl>
              <WindowControl>
                <Link
                  v-if="isMaximized"
                  :href="route('home.un-maximize')"
                  class="m-auto"
                >
                  <ResizeIcon class="h-4 w-4" />
                </Link>
                <Link v-else :href="route('home.maximize')" class="m-auto">
                  <ResizeIcon class="h-4 w-4" />
                </Link>
              </WindowControl>
              <WindowControl class="hover:bg-red-700">
                <Link :href="route('home.close')" class="m-auto">
                  <CrossIcon class="h-4 w-4" />
                </Link>
              </WindowControl>
            </div>
          </div>
        </div>
      </nav>

      <!-- Page Content -->
      <main>
        <div
          class="grid min-h-[calc(100vh-8.05rem)] grid-cols-[auto,1fr] gap-4 divide-x px-4 py-12"
        >
          <NavBar />
          <div class="px-4">
            <slot />
          </div>
        </div>

        <div class="sticky bottom-0 flex w-full">
          <div
            class="mx-auto w-full max-w-5xl rounded-t-md border border-light-primary bg-light-surface"
          >
            <keep-alive>
              <BottomPlayer key="fixed-key" />
            </keep-alive>
          </div>
        </div>
      </main>
    </div>
  </div>
  <ModalsContainer />
</template>
