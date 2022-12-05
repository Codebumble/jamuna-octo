<template>
	<Suspense>
		<template #default>
			<section
				id="cb-bg-video"
				class="overflow-hidden cb-hero relative">
				<div class="zigzag_bg">
					<Splide
						:options="options"
						aria-label="header slider">
						<SplideSlide
							v-for="(slide, item) in sliderContents"
							:key="item"
							class="flex justify-start items-center">
							<div class="image">
								<img
									v-if="
										/(\.jpg|\.jpeg|\.png|\.gif)$/i.exec(
											slide.src
										)
									"
									:src="slide.src"
									alt=""
									class="w-full object-cover h-[65vh] 2xl:h-[75vh]" />
								<video
									v-else
									class="w-full object-cover h-[65vh] 2xl:h-[75vh]"
									autoplay
									muted
									loop>
									<source
										:src="slide.src"
										type="video/mp4" />
									Your browser does not support the video tag.
								</video>
							</div>
							<div class="absolute w-full z-20">
								<div class="container flex flex-col">
									<div
										class="overflow-hidden top-vdo-img-slider">
										<div v-if="slide.c_link">
											<a
												:href="slide.c_link"
												class="ml-8 2xl:ml-8 xl:ml-0 text-white capitalize leading-snug w-[80%] lg:w-[50%] text-shadow-extreme"
												:class="slide.textStyle"
												:style="{
													color: slide.textColor,
												}"
												>{{ slide.heading }}</a
											>
										</div>
										<h1
											v-else
											class="ml-8 2xl:ml-8 xl:ml-0 text-white capitalize leading-snug w-[80%] lg:w-[50%] text-shadow-extreme"
											:style="{ color: slide.textColor }"
											:class="slide.textStyle">
											{{ slide.heading }}
										</h1>
									</div>
								</div>
							</div>
						</SplideSlide>
					</Splide>
				</div>
			</section>
		</template>
		<template #fallback>
			<section
				id="cb-bg-video"
				class="overflow-hidden cb-hero relative">
				<div class="w-full h-102 skeleton_bg"></div>
			</section>
		</template>
	</Suspense>

	<Suspense>
		<template #default>
			<section class="py-10">
				<div class="container">
					<div class="grid lg:grid-cols-3 gap-8">
						<div
							class="rounded bg-white bg-slate-100 hover:shadow-lg shadow-sm transition-all transform translate-y-0 hover:-translate-y-1 text-center lg:p-12 p-4 mx-auto border-b-4 border-red-600"
							v-for="data in mvo"
							:key="data">
							<img
								class="h-12 mx-auto my-4"
								:src="data.image"
								:alt="data.title" />
							<h3
								class="mb-2 font-bold font-heading text-xl uppercase">
								{{ data.title }}
							</h3>
							<p
								class="text-sm text-gray-400 leading-relaxed pb-4 lg:pb-0 uppercase">
								{{ data.desc }}
							</p>
						</div>
					</div>
				</div>
			</section>
		</template>
		<template #fallback>
			<section class="py-10 bg-slate-50">
				<div class="container">
					<div
						class="flex flex-col lg:flex-row gap-8 justify-between py-4 items-center">
						<div class="lg:basis-2/4">
							<h2 class="skeleton_bg h-6 mb-4 w-80"></h2>
						</div>
						<div class="lg:basis-2/4">
							<div>
								<div class="skeleton_bg h-6 mb-4 w-full"></div>
								<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-10/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-7/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-full"></div>
							</div>
						</div>
					</div>
					<div class="grid lg:grid-cols-3 gap-8 pt-8">
						<div
							class="rounded bg-white hover:shadow-md shadow-sm transition-all transform translate-y-0 hover:-translate-y-1 text-center lg:p-12 p-4 mx-auto">
							<div
								class="h-36 w-40 mx-auto my-4 skeleton_bg"></div>
							<h3
								class="mb-2 font-bold font-heading text-xl skeleton_bg h-6 w-80"></h3>
							<div>
								<div class="skeleton_bg h-6 mb-4 w-full"></div>
								<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-10/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-7/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-full"></div>
							</div>
						</div>
						<div
							class="rounded bg-white hover:shadow-md shadow-sm transition-all transform translate-y-0 hover:-translate-y-1 text-center lg:p-12 p-4 mx-auto">
							<div
								class="h-36 w-40 mx-auto my-4 skeleton_bg"></div>
							<h3
								class="mb-2 font-bold font-heading text-xl skeleton_bg h-6 w-80"></h3>
							<div>
								<div class="skeleton_bg h-6 mb-4 w-full"></div>
								<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-10/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-7/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-full"></div>
							</div>
						</div>
						<div
							class="rounded bg-white hover:shadow-md shadow-sm transition-all transform translate-y-0 hover:-translate-y-1 text-center lg:p-12 p-4 mx-auto">
							<div
								class="h-36 w-40 mx-auto my-4 skeleton_bg"></div>
							<h3
								class="mb-2 font-bold font-heading text-xl skeleton_bg h-6 w-80"></h3>
							<div>
								<div class="skeleton_bg h-6 mb-4 w-full"></div>
								<div class="skeleton_bg h-6 mb-4 w-8/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-10/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-7/12"></div>
								<div class="skeleton_bg h-6 mb-4 w-full"></div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</template>
	</Suspense>

	<!-- <Suspense>
		<template #default>
			<section class="py-16 overflow-hidden bg-slate-100">
				<div class="container">
					<div class="flex flex-col items-center">
						<div class="content w-full mb-6">
							<h2 class="heading">{{ aboutConcerns.heading }}</h2>
						</div>
						<div class="logo-slider w-full">
							<Splide
								:options="options2"
								aria-label="concerns logo slider">
								<SplideSlide
									v-for="logo in concernlogo"
									:key="logo"
									class="flex justify-around items-center transition-all overflow-hidden p-4">
									<router-link
										:to="
											'/companies/' +
											logo.id +
											'/' +
											logo.name.replaceAll(' ', '-')
										">
										<div
											class="concern rounded-full p-[0.7rem]">
											<img
												:src="
													'/company-images/' +
													logo.image
												"
												:alt="logo.name" />
										</div>
									</router-link>
								</SplideSlide>
							</Splide>
						</div>
					</div>
				</div>
			</section>
		</template>
		<template #fallback>
			<section class="py-16 overflow-hidden">
				<div class="container">
					<div class="flex flex-col items-center">
						<div class="content w-full mb-6">
							<h2
								class="heading skeleton_bg h-10 mb-4 w-40 mx-auto"></h2>
						</div>
						<div class="logo-slider w-full">
							<div
								class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 justify-center">
								<div
									class="flex justify-around items-center rounded-full transition-all concern skeleton_bg"
									v-for="logo in 5"
									:key="logo"></div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</template>
	</Suspense> -->
	<section class="overflow-hidden">
		<div>
			<div class="grid grid-cols-6 gap-4 lg:h-[600px]">
				<div class="col-span-6 lg:col-span-5">
					<Splide
						:options="preview"
						aria-label="preview"
						ref="main">
						<SplideSlide
							v-for="previews in slider"
							:key="previews"
							class="flex justify-start items-center"
							ref="main">
							<div class="w-full">
								<img
									:src="previews.src"
									:alt="previews.heading"
									class="object-cover w-full h-[38rem] rounded" />
							</div>
							<div
								class="absolute w-full z-20 flex self-end mb-40">
								<div class="container previews_slider">
									<div v-if="previews.c_link">
										<router-link
											:to="previews.c_link"
											class="ml-12 text-white text-shadow-extreme"
											:class="previews.textStyle"
											:style="{
												color: previews.textColor,
											}"
											>{{ previews.heading }}</router-link
										>
									</div>
									<p
										v-else
										class="ml-12 text-white text-shadow-extreme"
										:style="{ color: previews.textColor }"
										:class="previews.textStyle">
										{{ previews.heading }}
									</p>
								</div>
							</div>
						</SplideSlide>
					</Splide>
				</div>
				<div class="thumbnails col-span-6 lg:col-span-1">
					<Splide
						:options="thumbnails"
						aria-label="thumbnails"
						ref="thumbs">
						<SplideSlide
							v-for="thumbs in slider"
							:key="thumbs">
							<div class="bg-slate-200 overflow-hidden rounded">
								<img
									:src="thumbs.src"
									:alt="thumbs.heading"
									class="object-cover" />
								<p class="text-center capitalize">
									{{ thumbs.heading.substring(0, 22) }}
									<span v-if="thumbs.heading.length >= 22"
										>...</span
									>
								</p>
							</div>
						</SplideSlide>
					</Splide>
				</div>
			</div>
		</div>
	</section>
	<section class="py-12">
		<div class="container">
			<div class="">
				<div class="overflow-hidden">
					<h2
						class="mb-4 text-gray-800 font-bold lg:text-4xl text-2xl">
						{{ fe.top.title }}
					</h2>
					<p class="text-gray-400 leading-loose mb-6">
						{{ fe.top.desc }}
					</p>
					<div class="grid grid-rows-2 lg:grid-flow-col">
						<div
							class="py-4 transition-all transform translate-x-0 hover:translate-x-1"
							v-for="(item, key) in fe.list"
							:key="key">
							<router-link :to="'/future-expansion/' + item.id">
								<span
									class="inline-block py-2 px-4 mr-4 text-xs font-semibold bg-red-500 text-white rounded">
									{{ key + 1 }}
								</span>
								<span>{{ item.name }}</span>
							</router-link>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section
		class="about-us bg-slate-100 overflow-hidden lg:max-h-[700px] xs:max-h-[655px] md:max-h-[635px] max-h-[683px]">
		<div class="container">
			<div class="title py-8">
				<h2 class="text-2xl lg:text-4xl text-gray-800 font-bold">
					{{ items.title }}
				</h2>
				<p>
					{{ items.desc }}
				</p>
			</div>
		</div>
		<Splide
			:options="options3"
			aria-label="earth slider"
			class="w-full lg:w-4/6 mx-auto earth-slider">
			<SplideSlide
				v-for="slide in items.items"
				:key="slide">
				<div class="text-center capitalize piller">
					<h4>{{ slide.text }}</h4>
					<h4 class="mb-2">{{ slide.number }}</h4>
				</div>
			</SplideSlide>
		</Splide>
		<div class="earth"></div>
	</section>
	<section class="founder">
		<div class="quote">
			<div class="container">
				<div class="title mb-8">
					<h2
						class="text-2xl lg:text-4xl text-gray-800 font-bold uppercase text-center">
						{{ quote.header }}
					</h2>
				</div>
				<div
					class="flex gap-4 justify-center items-center flex-col xl:flex-row">
					<div class="yt basis-4/2">
						<iframe
							:src="quote.ylink"
							frameborder="0"
							allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
							allowfullscreen
							class="rounded-md xl:w-[37rem] h-56 xl:h-80 w-80"></iframe>
					</div>
					<div
						class="md:w-8/12 min-h-[250px] basis-4/2 py-4 px-8 xl:ml-4">
						<blockquote
							class="text-2xl xl:text-3xl xl:w-3/4 leading-tight">
							{{ quote.quote }}
						</blockquote>
						<cite class="block text-lg pt-2">
							{{ quote.name }}
						</cite>
						<span class="py-2">{{ quote.designation }}</span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section
		class="overflow-hidden"
		id="growing-up-slider">
		<div class="flex flex-col items-center">
			<div class="content w-full mb-6">
				<h2 class="heading uppercase">48 years of growing up</h2>
			</div>
			<div class="growing-slider w-full">
				<Splide
					:options="options4"
					@splide:pagination:mounted="onPaginationMounted"
					aria-label="g"
					class="h-[38rem] xl:h-[37rem]">
					<SplideSlide
						v-for="(item, index) in growingUpSlider"
						:key="index"
						class="flex justify-around items-center transition-all overflow-hidden p-4">
						<div class="growing-up-slider relative w-full">
							<img
								:src="item.src"
								alt=""
								class="w-full object-cover h-[90vh] xl:h-[100vh]" />
							<div
								class="company-name absolute bottom-28 w-full md:w-1/2 z-0 right-0 top-0 h-full">
								<div class="description growing-up-desc">
									<h3
										class="text-lg md:text-3xl text-white w-fit uppercase text-year italic font-bold">
										{{ item.desc }}
									</h3>
									<div v-if="item.c_link">
										<router-link
											:to="item.c_link"
											class="text-white w-fit uppercase text-title"
											:class="item.textStyle"
											:style="{
												color: item.textColor,
											}"
											>{{ item.heading }}</router-link
										>
									</div>
									<p
										v-else
										class="text-white w-fit uppercase text-title"
										:style="{ color: item.textColor }"
										:class="item.textStyle">
										{{ item.heading.substring(0, 260) }}
										<span v-if="item.heading.length >= 260"
											>...</span
										>
									</p>
								</div>
							</div>
						</div>
					</SplideSlide>
				</Splide>
			</div>
		</div>
	</section>
	<section class="group-company">
		<div class="container">
			<div class="title">
				<h2 class="text-2xl lg:text-4xl text-gray-800 font-bold">
					{{ groupTitle.title }}
				</h2>
				<p v-if="groupTitle.descVisibility == 'true'">
					{{ groupTitle.description }}
				</p>
			</div>
			<div class="company-slide">
				<Splide
					:options="options5"
					aria-label="group-companies">
					<SplideSlide
						class="slideItem px-2 lg:px-4"
						v-for="(slide, key) in slideContent"
						:key="key">
						<div
							class="p-4 pb-6 rounded hover:backdrop-blur-md min-h-[300px] max-h-[300px]">
							<img
								:src="slide.imgSrc"
								:alt="slide.alt"
								class="w-full rounded min-h-[200px] max-h-[200px] object-cover pt-0 bg-slate-50" />

							<!-- <span class="itemName">{{ slide.title }}</span> -->
							<router-link
								:to="slide.webLink"
								class="button block mx-auto mt-3"
								>{{ slide.linkText }}</router-link
							>
						</div>
					</SplideSlide>
				</Splide>
			</div>
		</div>
	</section>
	<section class="group-company bg-slate-100">
		<div class="lg:container px-2 lg:px-0">
			<div class="title">
				<h2 class="text-2xl lg:text-4xl text-gray-800 font-bold">
					{{ groupTitle2.title }}
				</h2>
				<p v-if="groupTitle2.descVisibility == 'true'">
					{{ groupTitle2.description }}
				</p>
			</div>
			<div class="company-slide">
				<Splide
					:options="options6"
					aria-label="group-companies">
					<SplideSlide
						class="slideItem px-2 lg:px-4"
						v-for="(slide, key) in slideContent2"
						:key="key">
						<img
							:src="slide.imgSrc"
							:alt="slide.alt"
							class="w-full rounded-bl-none rounded-br-none rounded-tr rounded-tl min-h-[200px] max-h-[200px] object-cover pt-0 bg-slate-50" />
						<div
							class="p-4 pb-6 rounded-tl-none rounded-tr-none rounded-bl rounded-br backdrop-blur-md min-h-[180px] max-h-[180px] overflow-hidden">
							<!-- <span class="itemName">{{ slide.title }}</span> -->

							<router-link
								:to="'/event-details/' + slide.webLink">
								<h4
									class="text-xl font-bold text-gray-800 mt-4 mb-2">
									{{
										slide.eventTitle.substring(0, 50) +
										'...'
									}}
								</h4>
							</router-link>
							<p class="text-base text-gray-400 pb-2">
								{{ slide.eventExerp.substring(0, 80) + ' ...' }}
							</p>
						</div>
					</SplideSlide>
				</Splide>
			</div>
		</div>
	</section>
	<section class="overflow-hidden">
		<div class="contact relative">
			<div class="bg-image h-[42rem] md:h-108 w-full">
				<img
					:src="bgImg"
					alt=""
					class="w-full h-full object-cover" />
			</div>
			<div
				class="form bg-white w-10/12 md:w-5/12 lg:w-1/3 h-110 md:h-104 pt-6 rounded-xl absolute top-8 right-[8.5%] md:right-8">
				<div class="heading">
					<h2
						class="text-gray-800 text-center text-xl lg:text-4xl font-bold leading-snug uppercase">
						contact us
					</h2>
					<p
						class="text-base text-center leading-snug py-4 text-gray-400 uppercase">
						together can
					</p>
				</div>
				<div class="grid md:gap-6">
					<div class="mt-5 md:mt-0">
						<form
							action="/frontpage-api/contact-page-mail-now"
							method="POST">
							<input
								type="hidden"
								name="_token"
								:value="csrf" />
							<div class="">
								<div class="px-4 py-5 space-y-6 sm:p-6">
									<div class="grid grid-cols-4 gap-6">
										<div class="col-span-4 sm:col-span-2">
											<div
												class="mt-1 flex rounded-md shadow-sm">
												<input
													type="text"
													name="c[name]"
													id="name"
													class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
													placeholder="Name"
													required />
											</div>
										</div>
										<div class="col-span-4 sm:col-span-2">
											<div
												class="mt-1 flex rounded-md shadow-sm">
												<input
													type="tel"
													name="c[phone]"
													id="phone"
													class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
													placeholder="Mobile Number (Ex: 0123-456-7890)"
													required />
											</div>
										</div>
									</div>
									<div class="grid gap-6">
										<div class="">
											<div
												class="mt-1 flex rounded-md shadow-sm">
												<input
													type="email"
													name="c[email]"
													id="email"
													class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
													placeholder="Email (Ex: alex@example.com)"
													required />
											</div>
										</div>
									</div>
									<div class="grid gap-6">
										<div class="">
											<div
												class="mt-1 flex rounded-md shadow-sm">
												<input
													type="text"
													name="c[subject]"
													id="email"
													class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
													placeholder="Subject (Ex: Contacting for some query)"
													required />
											</div>
										</div>
									</div>

									<div>
										<div class="mt-1">
											<textarea
												id="about"
												name="c[about]"
												rows="3"
												class="shadow-sm focus:ring-red-500 focus:border-red-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
												placeholder="Enter your message here..."
												required />
										</div>
									</div>
									<div class="px-4 py-3 text-center">
										<button
											type="submit"
											class="inline-flex justify-center py-2 px-6 border border-transparent hover:border-red-600 shadow-sm text-sm font-bold rounded-full text-white hover:text-red-600 bg-red-600 hover:bg-white transition-all uppercase mx-auto">
											Send Message
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../assets/scss/variables/_hero.scss';
	@import '../assets/scss/variables/_concerns-logo';
	@import '../assets/scss/variables/ind-slider';
	@import '../assets/scss/variables/_home_about.scss';
	@import '../assets/scss/variables/growing-up-slider';
	@import '../assets/scss/variables/_group-company';
	.quote {
		@apply pb-8 pt-12;
	}
	.earth {
		background-image: url('../images/contents/earth.png');

		@apply bg-top relative -top-8 lg:-top-28 lg:h-[300px] sm:h-[150px] xs:h-[125px] h-20;
		z-index: 9;
		background-size: 100% 100%;
		-webkit-mask-image: linear-gradient(
			rgba(255, 255, 255, 1) 0%,
			rgba(255, 255, 255, 1) 35%,
			rgba(255, 255, 255, 0) 100%
		);
	}
</style>

<script>
	import { onMounted, ref } from 'vue';
	export default {
		data() {
			return {
				sliderContents: [],
				aboutConcerns: {},
				concernlogo: [],
				mvo: [],
				slider: [],
				fe: {
					top: {
						title: '',
						desc: '',
					},
					list: [],
				},
				items: {},
				quote: {},
				growingUpSlider: [],
				groupTitle: {
					title: '',
					descVisibility: '',
					description: '',
				},
				slideContent: [],
				groupTitle2: {
					title: '',
					descVisibility: '',
					description: '',
				},
				slideContent2: [],
				csrf: document
					.querySelector('meta[name="csrf-token"]')
					.getAttribute('content'),
				bgImg: '',
				FounderDetails: {
					title: '',
				},
				meta: {
					title: '',
					description: '',
					image: '',
				},
			};
		},
		methods: {
			onPaginationMounted(_, data) {
				this.growingUpSlider.forEach((item, index) => {
					const el = data.items[index];
					el.button.classList.add('custom-button');
					el.button.classList.contains('is-active')
						? el.li.classList.add('is-active')
						: null;
					el.button.textContent = item.desc;
				});
			},
		},
		mounted() {
			document.title = 'Home | Jamuna Group';
			axios
				.get(window.location.origin + '/codebumble/data-home-api')
				.then((response) => {
					console.log('home page api->>',response.data);
					this.mvo = response.data['mission-vision-frontpage'].data;
					this.slider = response.data.slider;
					(this.fe.top.title = response.data['future-expansion-data'].top.title),
						(this.fe.top.desc = response.data['future-expansion-data'].top.desc),
						(this.fe.list = response.data['future-expansion-data'].data);
					this.sliderContents = response.data['video-slider'];
				});
			// axios
			// 	.get(window.location.origin + '/frontpage-api/concern-details')
			// 	.then((response) => {
			// 		this.aboutConcerns = response.data;
			// 	});
			// axios
			// 	.get(
			// 		window.location.origin + '/frontpage-api/company-name-logo'
			// 	)
			// 	.then((response) => {
			// 		this.concernlogo = response.data;
			// 	});
			axios
				.get(window.location.origin + '/frontpage-api/about-us-api')
				.then((response) => {
					this.items = response.data;
				});
			axios
				.get(window.location.origin + '/frontpage-api/slider-bottom')
				.then((response) => {
					this.growingUpSlider = response.data;
				});
			axios
				.get(window.location.origin + '/frontpage-api/all-product-view')
				.then((response) => {
					this.slideContent = response.data;
				});
			axios
				.get(window.location.origin + '/frontpage-api/product-header')
				.then((response) => {
					this.groupTitle.title = response.data.title;
					this.groupTitle.descVisibility =
						response.data.descVisibility;
					this.groupTitle.description = response.data.description;
				});
			axios
				.get(window.location.origin + '/frontpage-api/event-list')
				.then((response) => {
					response.data.forEach((item) => {
						this.slideContent2.push({
							imgSrc: item.image,
							alt: '',
							webLink: item.id,
							eventTitle: item.name,
							eventExerp: item.detail,
						});
					});
				});
			axios
				.get(window.location.origin + '/frontpage-api/event-header')
				.then((response) => {
					this.groupTitle2.title = response.data.title;
					this.groupTitle2.descVisibility =
						response.data.descVisibility;
					this.groupTitle2.description = response.data.description;
				});
			axios
				.get(window.location.origin + '/frontpage-api/meta-data')
				.then((response) => {
					this.bgImg = response.data.bimage;
				});
			axios
				.get(window.location.origin + '/founder-api/founder-speech')
				.then((response) => {
					this.quote = response.data.fquote;
				});
			axios
				.get(window.location.origin + '/founder-api/founder-speech')
				.then((response) => {
					this.FounderDetails = response.data.FounderDetails;
				});
			axios
				.get(window.location.origin + '/frontpage-api/meta-data')
				.then((response) => {
					this.meta = response.data;
				});
		},
		setup() {
			const options = {
				autoplay: true,
				rewind: true,
				perPage: 1,
				perMove: 1,
				pagination: true,
				arrows: true,
				type: 'fade',
				interval: 3000,
				pagination: false,
			};
			// const options2 = {
			// 	rewind: true,
			// 	autoplay: true,
			// 	perPage: 5,
			// 	perMove: 4,
			// 	arrows: true,
			// 	type: 'slide',
			// 	interval: 2000,
			// 	pagination: false,
			// 	breakpoints: {
			// 		1024: {
			// 			perPage: 4,
			// 			perMove: 3,
			// 		},
			// 		480: {
			// 			perPage: 2,
			// 			perMove: 1,
			// 		},
			// 	},
			// };
			const main = ref();
			const thumbs = ref();
			const thumbnails = {
				autoplay: true,
				interval: 2000,
				isNavigation: true,
				focus: 'center',
				// fixedWidth: 246,
				fixedHeight: '100px',
				width: '100%',
				height: 600,
				perPage: 4,
				gap: 10,
				rewind: true,
				pagination: false,
				arrows: true,
				direction: 'ttb',
				updateOnMove: true,
				breakpoints: {
					1023: {
						direction: 'ltr',
						perPage: 3,
						height: 130,
					},
					640: {
						perPage: 2,
					},
				},
			};
			const preview = {
				rewind: true,
				pagination: false,
				type: 'fade',
				autoplay: true,
				interval: 2000,
			};

			onMounted(() => {
				if (thumbs.value?.splide) {
					main.value?.sync(thumbs.value?.splide);
				}
			});
			const options3 = {
				autoplay: false,
				perPage: 5,
				perMove: 1,
				pagination: false,
				arrows: false,
				focus: 'center',
				type: 'loop',
				drag: false,
				interval: 2000,
				breakpoints: {
					1023: {
						type: 'slide',
						rewind: true,
						autoplay: true,
						perPage: 1,
						arrows: true,
					},
				},
			};
			const options4 = {
				autoplay: true,
				rewind: true,
				direction: 'ttb',
				height: '39rem',
				interval: 2000,
				breakpoints: {
					480: {
						direction: 'ltr',
						height: '550px',
					},
				},
			};
			const options5 = {
				trimSpace: true,
				arrows: true,
				autoplay: true,
				interval: 2000,
				perPage: 4,
				type: 'loop',
				perMove: 2,
				drag: true,
				breakpoints: {
					1024: {
						perPage: 2,
						perMove: 1,
					},
					640: {
						perPage: 1,
						perMove: 1,
					},
				},
			};
			const options6 = {
				trimSpace: true,
				arrows: true,
				autoplay: true,
				interval: 2000,
				perPage: 3,
				type: 'loop',
				perMove: 1,
				drag: true,
				pagination: false,
				breakpoints: {
					1024: {
						perPage: 1,
						perMove: 1,
					},
				},
			};
			return {
				main,
				options,
				// options2,
				options3,
				options4,
				options5,
				options6,
				preview,
				thumbs,
				thumbnails,
			};
		},
	};
</script>
