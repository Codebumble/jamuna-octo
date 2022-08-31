<template>
	<section class="contact pb-8 pt-32">
		<div class="container pb-8">
			<div class="flex flex-col items-center">
				<div class="content w-full mb-6">
					<h2 class="heading">{{ contents.header.title }}</h2>
					<p class="description">{{ contents.header.desc }}</p>
				</div>
			</div>
			<div class="main-content">
				<span class="date font-semibold text-xs inline-block mb-4"
					>Last Update: {{ contents.time }}</span
				>
				<div
					class="mb-4"
					v-for="(item, index) in contents.items"
					:key="index">
					<h3 class="title text-xl font-bold">{{ item.title }}</h3>
					<p>
						{{ item.content }}
					</p>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
</style>

<script>
export default {
	mounted() {},
	props: { contents: Object },
};
</script>
