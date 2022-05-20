<template>
  <div class="flex border-b border-40 -mx-6 px-6 nova-button-wrapper" v-if="field.visible">
    <div class="w-1/4 py-4">
      <label class="font-normal text-80">{{ field.label }}</label>
    </div>

    <div class="w-3/4 py-4 break-words">
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
          @click.prevent.stop="openModal = true"
        />

        <portal to="modals">
          <transition name="fade">
            <modal v-if="openModal" @modal-close="openModal = false">
              <div class="bg-white rounded-lg shadow-lg overflow-hidden" style="width: 460px">
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
                    @click.prevent.stop="openModal = false"
                  />

                  <nova-button v-bind="$props" :disabled="field.disabled" @finished="modalReload" />
                </div>
              </div>
            </modal>
          </transition>
        </portal>
      </div>
    </div>
  </div>
</template>

<script>
import field from '../../field';

export default {
  props: ['resource', 'resourceName', 'resourceId', 'field'],
  mixins: [field],
};
</script>
