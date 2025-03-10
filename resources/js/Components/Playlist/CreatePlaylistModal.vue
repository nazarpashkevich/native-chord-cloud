<script lang="ts">
import { defineComponent, ref } from 'vue';
import { VueFinalModal } from 'vue-final-modal';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { useDropzone } from 'vue3-dropzone';

export default defineComponent({
  name: 'CreatePlaylistModal',
  components: {
    InputError,
    PrimaryButton,
    InputLabel,
    TextInput,
    VueFinalModal,
  },
  methods: {
    submit() {
      this.form.post(route('media.playlist.store'), {
        onFinish: () => {
          this.$emit('close');
        },
      });
    },
  },
  emits: ['close'],
  setup() {
    const preview = ref<string | null>(null);

    const form = useForm({
      title: '',
      description: '',
      image: null as null | File,
    });

    function onDrop(acceptFiles: any[]): void {
      form.image = acceptFiles[0];
      preview.value = URL.createObjectURL(acceptFiles[0]);
    }

    const { getRootProps, getInputProps, ...rest } = useDropzone({
      onDrop,
      accept: ['image/jpeg', 'image/png'],
    });

    return { form, getRootProps, getInputProps, preview, ...rest };
  },
});
</script>

<template>
  <VueFinalModal
    class="flex items-center justify-center"
    content-class="flex flex-col max-w-xl mx-4 p-4 bg-white dark:bg-gray-900 border dark:border-gray-700 rounded-lg space-y-2 min-w-96"
  >
    <h1 class="mb-4 text-xl font-semibold">Create new playlist</h1>

    <form class="flex flex-col gap-6" @submit.prevent="submit">
      <div>
        <InputLabel for="title" value="Title" />

        <TextInput
          id="title"
          v-model="form.title"
          autocomplete="title"
          autofocus
          class="mt-1 block w-full"
          required
          type="text"
        />

        <InputError :message="form.errors.title" class="mt-2" />
      </div>
      <div>
        <InputLabel for="description" value="Description" />

        <TextInput
          id="description"
          v-model="form.description"
          autocomplete="description"
          autofocus
          class="mt-1 block w-full"
          required
          type="text"
        />

        <InputError :message="form.errors.description" class="mt-2" />
      </div>

      <div>
        <InputLabel for="image" value="Image" />
        <div class="flex h-48 w-full" v-bind="getRootProps()">
          <input v-bind="getInputProps()" />
          <div
            v-if="form.image"
            :style="{ backgroundImage: `url('${preview}')` }"
            class="h-full w-full bg-contain bg-center bg-no-repeat"
          ></div>
          <div
            v-else
            class="flex w-full items-center justify-center rounded-lg border-2 border-dashed border-slate-400 p-4 text-xs text-slate-400"
          >
            <p v-if="isDragActive">Drop the preview here ...</p>
            <p v-else>Drag 'n' drop preview here, or click to select file</p>
          </div>
        </div>
      </div>

      <div>
        <PrimaryButton
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
          class="mt-4"
        >
          Create
        </PrimaryButton>
      </div>
    </form>
  </VueFinalModal>
</template>
