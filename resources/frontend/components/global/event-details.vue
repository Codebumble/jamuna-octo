<template>
	<section class="businessDetails pb-28 pt-32">
		<div class="container">
			<div class="">
				<div
					class="w-full rounded-md shadow-lg border border-slate-100 p-8 overflow-hidden businessDetails">
					<p v-html="data.detail"></p>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		props: {
			data: Object,
		},
	};
</script>
