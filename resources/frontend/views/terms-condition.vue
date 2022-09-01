<template>
	<Suspense>
		<template #default>
			<termsNCondition :contents="contents" />
		</template>
		<template #fallback>
			<termsNConditionSkeleton />
		</template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
const termsNCondition = defineAsyncComponent({
	loader: () => import('../components/footer/terms-condition.vue'),
	timeout: 2000,
});
// Skeleton
import termsNConditionSkeleton from '../components/skeleton/terms-condition-skeleton.vue';

export default {
	components: {
		termsNCondition,
		termsNConditionSkeleton,
	},
	data() {
		return {
			contents: {
				title: '',
				content: '',
				time: '',
			},
		};
	},
	mounted() {
		document.title = 'Terms & Conditions | Jamuna Group';
		axios
			.get(window.location.origin + '/frontpage-api/tac-data')
			.then((response) => {
				this.contents = response.data;
			});
	},
};
</script>
