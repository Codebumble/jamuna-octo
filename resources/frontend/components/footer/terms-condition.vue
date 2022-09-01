<template>
	<section class="contact pb-8 pt-32">
		<div class="container pb-8">
			<div class="flex flex-col items-center">
				<div class="content w-full mb-6">
					<h2 class="text-4xl font-bold text-center">{{ contents.header.title }}</h2>
					<p class="description" v-if="contents.header.desc">{{contents.header.desc}}</p>
				</div>
			</div>
			<div class="main-content">
				<span class="date font-bold text-xs inline-block mb-4 text-center underline decoration-wavy decoration-gray-800 underline-offset-4">Last Update: {{contents.time}}</span>
				<div class="mb-4" v-for="(item, index) in contents.items" :key="index">
					<h3 class="title text-2xl font-bold">{{item.title}}</h3>
					<p>
						{{item.content}}
					</p>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
.date{
	text-align: center;
    display: block;
    margin-bottom: 2rem;
}
</style>

<script>
export default {
	mounted() {},
	props: {contents: Object}
};
</script>
