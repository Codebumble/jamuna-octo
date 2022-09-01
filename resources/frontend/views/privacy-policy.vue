<template>
	<Suspense>
		<template #default>
			<privacyPolicy :contents="contents" />
		</template>
		<template #fallback>
			<privacyPolicySkeleton />
		</template>
	</Suspense>

</template>

<script>
import { defineAsyncComponent } from 'vue';
const privacyPolicy = defineAsyncComponent({
	loader: () => import('../components/footer/terms-condition.vue'),
	timeout: 2000,
});
// Skeleton
import privacyPolicySkeleton from '../components/skeleton/terms-condition-skeleton.vue';

	export default {
		components: {
			privacyPolicy,
			privacyPolicySkeleton
		},
		data() {
			return {
				contents: {
					title: '',
					time: '',
					content: '',
				},
			};
		},
		setup() {},
		methods: {},
		created() {
			axios
				.get(window.location.origin + '/frontpage-api/privacy-data')
				.then(response => {
					this.contents = response.data
				})
		},
		mounted() {
			document.title = 'Privacy Policy | Jamuna Group'
		},
	};
</script>
