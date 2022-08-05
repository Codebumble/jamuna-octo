<template>
  <appHeader />
  <router-view></router-view>
  <appFooter />
</template>

<script>
import appHeader from "./components/header.vue";
import appFooter from "./components/footer.vue";

export default {
  components: {
    appHeader,
    appFooter,
  },
  setup() {},
};
</script>
