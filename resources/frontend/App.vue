<template>
  <metainfo>
    <template v-slot:title="{ content }">{{
      content ? `${content}` : `SITE_NAME`
    }}</template>
    <template v-slot:author="{ content }">{{
      content ? `${content}` : `AUTHOR`
    }}</template>
  </metainfo>
  <div>
    <router-link to="/">Go to Home</router-link>
    <router-link to="/about">Go to About</router-link>
  </div>

  <router-view></router-view>
</template>

<script>
export default {
  setup() {
    
  },
};
</script>
