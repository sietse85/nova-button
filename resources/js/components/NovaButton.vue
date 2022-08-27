<template>
  <span v-if="field.visible" :class="ajaxClasses">
    <button
      ref="novabutton"
      type="button"
      class="nova-button"
      v-html="buttonText"
      :disabled="disabled"
      @click.prevent.stop="handleClick"
      :class="buttonClasses"
      :style="{ 'min-width': buttonWidth }"
      :title="field.title"
    ></button>
  </span>
</template>

<style>
.nova-button {
  white-space: nowrap;
}

.nova-button-loading,
.nova-button-success,
.nova-button-error {
  pointer-events: none;
}
</style>

<script>
import {Inertia} from '@inertiajs/inertia';
import {queue} from '../queue.js';

export default {
  props: ['resource', 'resourceName', 'resourceId', 'field', 'ajaxClasses', 'disabled'],
  data: () => ({
    buttonWidth: null,
    loading: false,
    success: false,
    error: false,
  }),
  mounted() {
    this.$nextTick(() => {
      this.buttonWidth = this.$refs.novabutton.clientWidth + 2 + 'px';
    });
  },
  methods: {
    async handleClick() {
      if (this.field.disabled) {
        return;
      }

      if (this.navigate()) {
        return;
      }

      queue.add(this.resourceId);
      this.$emit('clicked');

      try {
        if (this.field.action === null) {
          await this.post();
        } else {
          await this.action();
        }

        this.success = true;
        this.loading = false;

        queue.hasSuccess = true;
        queue.remove(this.resourceId);

        this.$emit('success');
        this.$emit('finished');

      } catch (error) {
        this.error = true;
        this.loading = false;

        queue.hasError = true;

        queue.remove(this.resourceId);

        this.$emit('error');
        this.$emit('finished');
      }
    },
    action() {
      this.$emit('loading');

      if (this.resourceName === undefined || this.resourceId === null || this.field.key === null) {
        return;
      }

      window.setTimeout(() => {
        this.loading = true;
      }, 200);

      return Nova.request().post(
        `/nova-vendor/sietse85/nova-button/action`,
        {
          actionClass: this.field.action,
          resourceId: this.resourceId,
          model: this.field.model
        }
      ).then((response) => {
        const data = response.data;
        if (data.hasOwnProperty('message')) {
          Nova.$toasted.success(response.data.message);
        } else if (data.hasOwnProperty('danger')) {
          Nova.$toasted.error(response.data.danger);
        }
      });
    },
    post() {
      this.$emit('loading');

      if (this.resourceName === undefined || this.resourceId === null || this.field.key === null) {
        return;
      }

      window.setTimeout(() => {
        this.loading = true;
      }, 200);

      return Nova.request().post(
        `/nova-vendor/sietse85/nova-button/${this.resourceName}/${this.resourceId}/${this.field.key}`,
        {event: this.field.event}
      );
    },
    navigate() {
      if (this.field.type === 'route') {
        const r = this.field.route;
        const base = `${Nova.appConfig.base}/resources/`;
        if (r.name === 'lens') {
          Inertia.visit(`${base}${r.params.resourceName}/${r.name}/${r.params.lens}`);
        } else if (r.name === 'index') {
          Inertia.visit(`${base}${r.params.resourceName}/`);
        } else if (r.name === 'edit') {
          Inertia.visit(`${base}${r.params.resourceName}/${r.params.resourceId}/edit`);
        } else if (r.name === 'detail') {
          Inertia.visit(`${base}${r.params.resourceName}/${r.params.resourceId}/`);
        } else {
          Inertia.visit(`${base}${r.params.resourceName}/new/`);
        }

        return true;
      }

      if (this.field.type === 'link') {
        window.open(this.field.link.href, this.field.link.target);
        return true;
      }

      return false;
    },
  },
  computed: {
    buttonText() {
      if (this.field.link && this.field.link.target === '_blank') {
        return this.field.text;
      }

      if (this.error && this.field.errorText) {
        return this.field.errorText;
      }

      if (this.success && this.field.successText) {
        return this.field.successText;
      }

      if (this.loading && this.field.loadingText) {
        return this.field.loadingText;
      }

      return this.field.text;
    },
    buttonClasses() {
      if (this.field.link && this.field.link.target === '_blank') {
        return this.field.classes;
      }

      if (this.error && this.field.errorClasses.length) {
        return this.field.errorClasses + ' text-center nova-button-error';
      }

      if (this.success && this.field.successClasses.length) {
        return this.field.successClasses + ' text-center nova-button-success';
      }

      if (this.loading && this.field.loadingClasses) {
        return this.field.loadingClasses + ' text-center nova-button-loading';
      }

      return this.field.classes;
    },
  },
};
</script>
