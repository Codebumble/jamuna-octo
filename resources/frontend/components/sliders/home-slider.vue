<template>
  <section id="cb-bg-video" class="overflow-hidden cb-hero relative">
    <div class="">
      <Splide :options="options" aria-label="My Favorite Images" class="">
        <SplideSlide
          v-for="slide in sliderContents"
          class="flex justify-start items-center"
          :class="{ overlay: slide.overlay }"
        >
          <img :src="slide.src" :alt="slide.alt" class="w-full h-[500px] object-cover" />
          <div class="absolute w-[55%] z-20">
            <div class="container px-16 flex flex-col">
              <div class="overflow-hidden">
                <h1
                  class="text-3xl lg:text-[40px] text-white font-bold capitalize leading-snug"
                >
                  {{ slide.heading }}
                </h1>
                <p
                  v-if="slide.showDescription"
                  class="text-white capitalize text-lg mt-2"
                >
                  {{ slide.description }}
                </p>
              </div>
              <a
                v-if="slide.showButton"
                :href="slide.link"
                :class="{ button: slide.button, 'button-alt': slide.buttonAlt }"
                class="mt-4 capitalize font-bold"
                >{{ slide.buttonText }}</a
              >
            </div>
          </div>
        </SplideSlide>
      </Splide>
    </div>
  </section>
</template>

<style lang="scss">
@import "@splidejs/vue-splide/css";
@import "../../assets/scss/variables/_hero.scss";

.splide__pagination__page {
  background: #fff;
  border: 0;
  border-radius: 50%;
  display: inline-block;
  height: 6px;
  margin: 5px;
  opacity: 1;
  padding: 0;
  position: relative;
  transition: transform 0.2s linear;
  width: 6px;
}

.splide__pagination__page.is-active {
  background: #fff;
  transform: scale(1.4);
  z-index: 20;
  width: 12px;
  height: 5px;
  border-radius: 50px;
  @apply bg-rose-600;
}
</style>

<script>
import { Splide, SplideSlide } from "@splidejs/vue-splide";
export default {
  data() {
    return {
      sliderContents: [
        {
          src: "/frontend/images/slider/2.jpg",
          alt: "logo",
          heading: "demo text",
          description: "something",
          buttonText: "button",
          button: true,
          buttonAlt: false,
          link: "google.com",
          showDescription: true,
          showButton: true,
          overlay: true,
        },
        {
          src: "/frontend/images/slider/3.jpg",
          alt: "logo",
          heading: "overlay, button, description disabled here",
          description: "something",
          buttonText: "button",
          button: false,
          buttonAlt: true,
          link: "google.com",
          showDescription: false,
          showButton: false,
          overlay: false,
        },
        {
          src: "/frontend/images/slider/4.jpg",
          alt: "logo",
          heading: "demo text",
          description: "something",
          buttonText: "button",
          button: false,
          buttonAlt: true,
          link: "google.com",
          showDescription: true,
          showButton: true,
          overlay: true,
        },
      ],
    };
  },
  components: {
    Splide,
    SplideSlide,
  },
  setup() {
    const options = {
      rewind: false,
      arrows: false,
      autoplay: true,
      perPage: 1,
      type: "loop",
      perMove: 1,
      drag: true,
      pauseOnHover: true,
      cloneStatus: false,
    };

    return { options };
  },
};
</script>
