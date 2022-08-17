<template>
	<div class="">
		<div
			v-for="(src, index) in imgs"
			:key="index"
			class="pic"
			@click="() => showImg(index)">
			<img :src="src" />
		</div>
	</div>
	<vue-easy-lightbox
		:visible="visibleRef"
		:imgs="imgs"
		:index="indexRef"
		@hide="onHide"></vue-easy-lightbox>
</template>

<script>
	import { defineComponent, ref } from 'vue';
	import VueEasyLightbox, { useEasyLightbox } from 'vue-easy-lightbox';

	export default defineComponent({
		components: {
			VueEasyLightbox,
		},
		setup() {
			const visibleRef = ref(false);
			const indexRef = ref(0);
			const imgs = [
				'https://via.placeholder.com/450.png/',
				'https://via.placeholder.com/300.png/',
				'https://via.placeholder.com/150.png/',
				{
					src: 'https://via.placeholder.com/450.png/',
					title: 'this is title',
				},
			];
			const showImg = (index) => {
				indexRef.value = index;
				visibleRef.value = true;
			};
			const onHide = () => (visibleRef.value = false);
			return {
				visibleRef,
				indexRef,
				imgs,
				showImg,
				onHide,
			};
		},
	});
</script>
