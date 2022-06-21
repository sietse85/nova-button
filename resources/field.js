import { Inertia } from '@inertiajs/inertia';
import { queue } from './js/queue';

export default {
  data() {
    return {
      isModalOpen: false,
    };
  },
  methods: {
    reload() {
      if (this.field.reload && queue.allowsReload()) {
        window.setTimeout(() => {
          Inertia.reload()
        }, 200);
      }
    },
    modalReload() {
      window.setTimeout(() => {
        this.isModalOpen = false;
        this.reload();
      }, 400);
    },
  },
};
