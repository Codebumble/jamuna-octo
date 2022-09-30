<template>
	<appHeader />
	<router-view v-slot="{ Component, route }">
		<transition
			name="fade"
			mode="out-in">
			<div :key="route.name">
				<component :is="Component"></component>
			</div>
		</transition>
	</router-view>
	<appFooter />
</template>

<style lang="scss">
	@import './assets/scss/variables/skeleton';
	.fade-enter-from,
	.fade-leave-to {
		opacity: 0;
	}

	.fade-enter-active,
	.fade-leave-active {
		transition: opacity 0.5s ease-out;
	}
</style>

<script>
	import { defineAsyncComponent } from 'vue';
	import appHeader from './components/header.vue';

	export default {
		components: {
			appHeader,
			appFooter: defineAsyncComponent({
				loader: () => import('./components/footer.vue'),
				delay: 3000,
			}),
		},
	};
</script>
