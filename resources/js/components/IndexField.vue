<template>
  <div v-if="field.visible">
    <span
      v-if="field.confirm === null"
      :class="{ 'block text-right': field.indexAlign === 'right' }"
    >
      <nova-button
        :field="field"
        :resourceName="resourceName"
        :resourceId="resource.id.value"
        :disabled="field.disabled"
        @finished="reload"
      />
    </span>

    <div v-else :class="{ 'block text-right': field.indexAlign === 'right' }">
      <button
        class="whitespace-no-wrap"
        :class="field.classes"
        :disabled="field.disabled"
        v-html="field.text"
        @click.stop="isModalOpen = true"
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
</template>

<script>
import field from '../../field';
import NovaButton from './NovaButton';
import ConfirmModal from './ConfirmModal';

export default {
  components: { ConfirmModal, NovaButton },
  props: ['resource', 'resourceName', 'field'],
  mixins: [field],
};
</script>
