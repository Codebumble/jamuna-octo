<template>
	<Suspense>
		<template #default>
			<contact />
		</template>
		<template #fallback>
			<contactSkeleton />
		</template>
	</Suspense>

</template>

<script>
import { defineAsyncComponent } from 'vue';
const contact = defineAsyncComponent({
	loader: () => import('../components/contact/contact'),
	timeout: 2000,
});
// Skeleton
import contactSkeleton from '../components/skeleton/contact-form-skeleton.vue';

	export default {
		components: {
			contact,
			contactSkeleton
		},
		mounted() {
			document.title = 'Contact | Jamuna Group'
		},

	};
</script>
