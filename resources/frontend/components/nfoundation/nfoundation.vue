<template>
	<section class="nfoundation">
		<div class="container">
			<h2 class="text-2xl text-red-400 text-center">
				This page is under construction. <br />
				Will be available soon!
			</h2>
		</div>
	</section>
</template>

<style lang="scss">
	.nfoundation {
		@apply py-32;
	}
</style>

<script>
	export default {
		data() {
			return {};
		},
		created() {
			window.location.href = 'https://google.com/contact';
		},
	};
</script>
