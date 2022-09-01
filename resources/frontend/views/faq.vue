<template>
	<Suspense>
		<template #default>
			<faq :contents="contents" />
		</template>
		<template #fallback>
			<faqSkeleton />
		</template>
	</Suspense>
</template>

<script>
import { defineAsyncComponent } from 'vue';
const faq = defineAsyncComponent({
	loader: () => import('../components/footer/faq.vue'),
	timeout: 2000,
});
// Skeleton
import faqSkeleton from '../components/skeleton/terms-condition-skeleton.vue';


export default {
	components: {
		faq,
		faqSkeleton
	},
	data() {
		return {
			contents: {
				header: {
					title: '',
					desc: ''
				},
				items: [],
			},
		};
	},
	created() {
		axios
		.get(window.location.origin + '/frontpage-api/faq-api')
		.then(response => {
			const contents = response.data;
			this.contents.header = {
				title: contents.header.title,
				desc: contents.header.desc,
			}
			contents.items.forEach(item => {
				this.contents.items.push(item)
			})
		})
	},
	mounted() {
		document.title = 'FAQ | Jamuna Group'
	},
};
</script>
