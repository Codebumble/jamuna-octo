<template>
	<joblist />
</template>

<script>
	import joblist from '../components/global/joblist';
	export default {
		components: {
			joblist,
		},
		mounted() {
			document.title = 'Career | Jamuna Group'
		},
	};
</script>
