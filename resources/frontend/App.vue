<template>
	<appHeader />
	<router-view></router-view>
	<appFooter />
</template>

<script>
	import { defineAsyncComponent } from 'vue';
	import appHeader from './components/header.vue';

	export default {
		components: {
			appHeader,
			appFooter: defineAsyncComponent({
				loader: () => import('./components/footer.vue'),
				delay: 3000,
				timeout: 3000,
			}),
		},
		setup() {},
	};
</script>
