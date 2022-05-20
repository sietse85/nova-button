<template>
  <div class="flex border-b border-40 nova-button-wrapper" v-if="field.visible">
    <div class="px-8 py-6 w-1/5">
      <h4 class="inline-block text-80 leading-tight">{{ field.label }}</h4>
    </div>

    <div class="px-8 py-6 w-1/2">
      <span v-if="field.confirm == null">
        <nova-button
          :field="field"
          :resourceName="resourceName"
          :resourceId="resourceId"
          :disabled="field.disabled"
          @finished="reload"
        />
      </span>

      <div v-else>
        <button
          :class="field.classes"
          :disabled="field.disabled"
          v-html="field.text"
          @click.prevent.stop="isModalOpen = true"
        />

        <confirm-modal
          v-if="isModalOpen"
          :field="field"
          :resource-name="resourceName"
          :resource="resource"
          @finished="modalReload"
        ></confirm-modal>
      </div>
    </div>
  </div>
</template>

<script>
import field from '../../field';
import NovaButton from './NovaButton';
import ConfirmModal from './ConfirmModal';

export default {
  components: { ConfirmModal, NovaButton },
  props: ['resource', 'resourceName', 'resourceId', 'field'],
  mixins: [field],
};
</script>
