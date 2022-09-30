<template>
  <div class="modal" @click.prevent.stop="">
    <div class="modal-inner">
      <transition name="fade">
        <form class="bg-white rounded-lg shadow-lg overflow-hidden" style="width: 460px">
          <div class="p-8">
            <heading :level="2" class="mb-6" v-html="field.confirm.title"></heading>
            <p class="text-80 leading-normal" v-html="field.confirm.body"></p>
          </div>

          <div
            class="border-t border-50 px-6 py-3 ml-auto flex items-center"
            style="min-height: 70px; flex-direction: row-reverse"
          >
            <button
              style="order: 2"
              class="cursor-pointer btn text-80 font-normal px-3 mr-3 btn-link"
              v-html="field.confirm.cancelButtonText"
              @click.prevent.stop="$parent.isModalOpen = false"
            />

            <nova-button
              :field="field"
              @finished="$emit('finished')"
              :resourceName="resourceName"
              :resourceId="resource.id.value"
              :disabled="field.disabled"
            />
          </div>
        </form>
      </transition>
    </div>
  </div>
</template>

<script>
import field from '../../field';
import NovaButton from './NovaButton';

export default {
  components: { NovaButton },
  props: ['resource', 'resourceName', 'field'],
  mixins: [field],
};
</script>

<style>
.modal {
  position: fixed;
  z-index: 100;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-inner {
  position: absolute;
  background-color: #fff;
  opacity: 1;
  z-index: 100;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
