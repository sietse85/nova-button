<template>
  <div
    class="flex flex-col md:flex-row -mx-6 px-6 py-2 md:py-0 space-y-2 md:space-y-0 border-t border-gray-100 dark:border-gray-700"
    v-if="field.visible"
  >
    <div class="md:w-1/4 md:py-5">
      <h4 class="font-bold md:font-normal pt-5">
        <span>{{ field.label }}</span>
      </h4>
    </div>

    <div class="md:w-3/4 md:py-3 break-words">
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
