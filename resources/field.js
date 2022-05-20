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
          this.$router.go();
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
