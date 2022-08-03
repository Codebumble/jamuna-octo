<template>
    <div>
        <h1>About</h1>
    </div>
</template>


<script>
import { useHead } from "@vueuse/head";
export default {
    setup () {
useHead({
      title: "something about",
      meta: [
        {
          name: `description`,
          content: `blalala`,
        },
        {
            name: `keywords`,
            content: `codebumble`,
        }
      ],
    });
    },
}
</script>