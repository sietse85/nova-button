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
        @click="openModal = true"
      />

      <portal to="modals" v-if="openModal">
        <transition name="fade">
          <modal @modal-close="openModal = false">
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
                  @click.prevent="openModal = false"
                />

                <nova-button
                  :field="field"
                  @finished="modalReload"
                  :resourceName="resourceName"
                  :resourceId="resource.id.value"
                  :disabled="field.disabled"
                />
              </div>
            </form>
          </modal>
        </transition>
      </portal>
    </div>
  </div>
</template>

<script>
import field from '../../field';

export default {
  props: ['resource', 'resourceName', 'field'],
  mixins: [field],
};
</script>
