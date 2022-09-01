<template>
	<section class="contact pb-8 pt-32">
		<div class="container pb-8">
			<div class="text-center pb-14">
				<h2 class="skeleton_bg h-[50px] w-72 mx-auto"></h2>
			</div>
			<div class="w-full lg:w-[1024px] mx-auto" style="border: '1xp solid gray'">
				<div v-for="index in 4" :key="index">
					<div class="skeleton_bg h-8 w-full"></div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
export default {};
</script>
