<template>
  <div>
    <h1 class="text-white">Jamuna Group is Coming soon!</h1>
    <i class="fab fa-facebook"></i>
  </div>
</template>

<script>
import { useHead } from "@vueuse/head";

export default {
  setup() {
    useHead({
      title: "something",
      meta: [
        {
          name: `description`,
          content: `blalala`,
        },
        {
          "http-equiv": `Content-Type`,
          content: `text/html; charset=UTF-8`,
        },
        {
          name: "viewport",
          content: "width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui",
        },
      ],
    });
  },
};
</script>
