<template>
  <headerNav />
  <router-view></router-view>
</template>

<script>
import headerNav from "./components/navigation/header-nav.vue";

export default {
  components: {
    headerNav,
  },
  setup() {},
};
</script>
