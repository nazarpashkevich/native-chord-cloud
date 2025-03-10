<script>
import { defineComponent } from 'vue';
import { useModal } from 'vue-final-modal';
import PrimaryButton from '@/Components/PrimaryButton.vue';

export default defineComponent({
  name: 'OpenModalButton',
  components: { PrimaryButton },
  props: {
    title: {
      type: String,
      required: true,
    },
    modalComponent: {
      required: true,
    },
  },
  setup(props) {
    const { open, close } = useModal({
      component: props.modalComponent,
      attrs: {
        onClose() {
          close();
        },
      },
    });

    return { open, close };
  },
});
</script>

<template>
  <PrimaryButton class="ml-auto" @click="open">
    {{ title }}
  </PrimaryButton>
</template>
