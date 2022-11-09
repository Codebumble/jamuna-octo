<template>
	<Suspense>
		<template #default>
			<companyProfile />
		</template>
		<template #fallback>
			<companyProfileSkeleton />
		</template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
const companyProfile = defineAsyncComponent({
	loader: () => import('./comp-dept.vue'),
	timeout: 2000,
});
import companyProfileSkeleton from '../components/skeleton/company-profile-skeleton.vue';
export default {
	components: {
		companyProfile,
		companyProfileSkeleton,
	},
	mounted() {
		document.title = 'Business Vertical | Jamuna Group';
	},
};
</script>
