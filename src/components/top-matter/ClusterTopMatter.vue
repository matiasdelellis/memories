<template>
  <div class="top-matter">
    <NcActions v-if="name">
      <NcActionButton :aria-label="t('memories', 'Back')" @click="back()">
        {{ t('memories', 'Back') }}
        <template #icon> <BackIcon :size="20" /> </template>
      </NcActionButton>
    </NcActions>
    <span class="name">{{ name || viewname }}</span>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

import NcActions from '@nextcloud/vue/dist/Components/NcActions.js';
import NcActionButton from '@nextcloud/vue/dist/Components/NcActionButton.js';

import * as strings from '@services/strings';

import BackIcon from 'vue-material-design-icons/ArrowLeft.vue';

export default defineComponent({
  name: 'ClusterTopMatter',
  components: {
    NcActions,
    NcActionButton,
    BackIcon,
  },

  computed: {
    viewname(): string {
      return strings.viewName(this.$route.name!);
    },

    name(): string | null {
      switch (this.$route.name) {
        case _m.routes.Tags.name:
          return this.t('recognize', this.$route.params.name);
        default:
          return null;
      }
    },
  },

  methods: {
    back() {
      this.$router.go(-1);
    },
  },
});
</script>
