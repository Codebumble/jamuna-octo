<template>
	<section class="news-center pb-28 pt-32">
		<div class="container pb-8">
			<div
				class="flex gap-4 justify-center items-center flex-col xl:flex-row">
				<div class="yt basis-4/2">
					<iframe
						:src="data.ytSrc"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen
						class="rounded-md xl:w-[37rem] h-56 xl:h-80 w-80"></iframe>
				</div>
				<div
					class="md:w-8/12 xl:border-l-2 border-gray-400 min-h-[250px] basis-4/2 py-4 px-8 xl:ml-4">
					<h2 class="text-xl font-bold mb-4">
						{{ data.title }}
					</h2>
					<div
						class="flex flex-col sm:flex-row xl:flex-col justify-between">
						<div class="mb-4">
							<h4 class="text-md font-bold">Contact Us:</h4>
							<span class="block">Phone: {{ data.phone }}</span>
							<span class="block">Email:{{ data.email }}</span>
						</div>
						<div class="">
							<h4 class="text-md font-bold">Address:</h4>
							<span class="block">{{
								data.address.officeName
							}}</span>
							<span class="block">{{ data.address.road }}</span>
						</div>
					</div>
				</div>
			</div>
			<!-- district correspondent -->
			<div class="heading">
				<h2>{{ data.distHeading.title }}</h2>
				<p>
					{{ data.distHeading.desc }}
				</p>
			</div>
			<div
				class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 py-8">
				<div
					class="member"
					v-for="(member, key) in visibleDistMember"
					:key="key">
					<div class="thumb">
						<img
							:src="'/profile-images/' + member.imgSrc"
							:alt="member.alt"
							class="image max-h-[288px] min-h-[288px]" />
					</div>
					<div class="info">
						<h3>{{ member.name }}</h3>
						<p>{{ member.position }}</p>
						<p>{{ member.areas }}</p>
					</div>
				</div>
			</div>
			<button
				class="loadMore"
				@click="distMemberVisible += step"
				v-if="distMemberVisible < data.distCorres.length">
				Load more...
			</button>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_news-center';
</style>

<script>
	export default {
		data() {
			return {
				distMemberVisible: 4,
				step: 4,
			};
		},
		props: {
			data: Object,
		},
		computed: {
			visibleDistMember() {
				return this.data.distCorres.slice(0, this.distMemberVisible);
			},
		},
	};
</script>
