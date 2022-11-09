<template>
	<section id="cb-bg-video" class="overflow-hidden cb-hero relative">
		<div class="zigzag_bg">
			<div class="flex justify-start items-center">
				<div class="image">
					<img
						:src="breadcumb.src"
						alt=""
						class="w-full object-cover h-[90vh]" />
				</div>
				<div class="absolute w-full z-20">
					<div class="container flex flex-col">
						<div class="overflow-hidden">
							<h1
								class="
									ml-8
									2xl:ml-8
									xl:ml-0
									text-2xl
									lg:text-[36px]
									text-white
									font-bold
									capitalize
									leading-snug
									w-[80%]
									lg:w-[50%]
									text-shadow-extreme
								">
								{{ breadcumb.title }}
							</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="contact pb-8 pt-16">
		<div class="container pb-8">
			<div class="main-content">
				<div class="mb-4" v-html="contents.text"></div>
				<div class="image-gallery pb-16 pt-8">
					<div
						class="
							grid grid-cols-1
							lg:grid-cols-4
							md:grid-cols-2
							gap-5
							pb-8
						">
						<div
							v-for="(item, index) in contents.images"
							:key="index"
							class="image">
							<div class="thumbnail">
								<img :src="item.src" :alt="breadcumb.title" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
export default {
	data() {
		return {
			breadcumb: {
				src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
				title: 'Double Horse Tyre',
			},
			contents: {
				text: '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt quam magni nisi reprehenderit provident ducimus officia nostrum aspernatur, aliquid odit quis dignissimos neque commodi tempora perferendis. Nemo reprehenderit ullam ex unde saepe neque pariatur distinctio iste quos.</p><p>Veniam labore, eius eos magnam amet hic. Tempore, cum harum itaque rerum ipsum minima, magni qui laudantium sunt quasi earum. Illo, enim! Esse, minima voluptatum, labore quaerat, magni ad unde ab quae quidem nisi magnam</p><p>Voluptatem quibusdam quos? Nam ipsa fuga reiciendis cum voluptas ex consequatur asperiores recusandae debitis ab, officia sed voluptatum adipisci vero ad sapiente repudiandae exercitationem illo aliquam delectus?</p>',
				images: [
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
					{
						src: 'https://beta.jamunagroup.com.bd/images/company-gallery/1662995804-010-company-images.jpg',
					},
				],
			},
		};
	},
};
</script>

<style lang="scss">
@import '../assets/scss/variables/_hero.scss';
@import '../assets/scss/variables/image-gallery';
</style>
