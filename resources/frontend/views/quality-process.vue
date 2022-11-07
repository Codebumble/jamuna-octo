<template>
		<Suspense>
		<template #default>
			<qualityProcess />
		</template>
		<template #fallback>
			<qualityProcessSkeleton />
		</template>
	</Suspense>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap');
@import url('https://fonts.gstatic.com');
@import '../../../vendors/css/editors/quill/quill.bubble.css';
@import '../../../vendors/css/editors/quill/quill.snow.css';
@import '../../../vendors/css/editors/quill/monokai-sublime.min.css';
@import url('https://cdn.quilljs.com/1.3.6/quill.core.css');
</style>

<script>
import { defineAsyncComponent } from 'vue';
const qualityProcess = defineAsyncComponent({
	loader: () => import('../components/management/quality-process.vue'),
	timeout: 2000,
});
// Skeleton
import qualityProcessSkeleton from '../components/skeleton/quality-process-skeleton.vue';
	export default {
		components: {
			qualityProcess,
			qualityProcessSkeleton
		},
		mounted() {
			document.title = 'Quality Process | Jamuna Group'
		},
	};
</script>
