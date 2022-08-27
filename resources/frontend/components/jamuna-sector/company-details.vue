<template>
	<Suspense>
		<template #default>
			<businessDetails
				:data="company"
				:images="images"
				@pageNumber="photos" />
		</template>
		<template #fallback> <skeleton /> </template>
	</Suspense>
</template>

<script>
	import { defineAsyncComponent } from 'vue';
	import skeleton from '../skeleton/business-details-skeleton';
	// import businessDetails from '../global/business-details';
	const businessDetails = defineAsyncComponent({
		loader: () => import('../global/business-details'),
		timeout: 2000,
	});
	export default {
		components: {
			businessDetails,
			skeleton,
		},
		data() {
			return {
				company: {
					businessLogo: '',
					alt: 'image alt',
					objectfit: true, //For logo size responsiveness
					businessName: '',
					establishDate: '',
					ceo: '',
					address: {
						officeName: '',
						officeRoad: '',
						location: '',
						country: '',
					},
					mail: '',
					emailName: '',
					mobile: '',
					website: '',
					products: '',
					capacity: '',
					manpower: '',
					social: {
						facebook: '',
						instagram: '',
						linkedin: '',
					},
					textSummary: true,

					textDetails: {
						details: '',
						shortDetails: '',
					},
					sharing: {
						url: window.location.origin + this.$route.path,
						title: 'Say hi to Vite! A brand new, extremely fast development setup for Vue.',
						description:
							'This week, I’d like to introduce you to "Vite", which means "Fast". It’s a brand new development setup created by Evan You.',
						quote: "The hot reload is so fast it's near instant. - Evan You",
						hashtags: 'vuejs,vite,javascript',
						twitterUser: 'youyuxi',
					},
					networks: [
						{
							network: 'email',
							name: 'Email',
							icon: 'far fa-envelope',
						},
						{
							network: 'facebook',
							name: 'Facebook',
							icon: 'fab fa-facebook',
						},
						{
							network: 'linkedin',
							name: 'LinkedIn',
							icon: 'fab fa-linkedin',
						},
						{
							network: 'messenger',
							name: 'Messenger',
							icon: 'fab fa-facebook-messenger',
						},
						{
							network: 'twitter',
							name: 'Twitter',
							icon: 'fab fa-twitter',
						},
						{
							network: 'whatsapp',
							name: 'Whatsapp',
							icon: 'fab fa-whatsapp',
						},
					],
				},
				images: [],
				page: 1,
			};
		},
		setup() {},
		metaInfo() {
			return {
				title: this.company.businessName,
				// title: this.FounderDetails.title,
				description: this.company.textDetails.shortDetails.substring(
					0,
					150
				),
				charset: 'utf-8',
				htmlAttrs: {
					lang: 'en',
				},
				og: {
					title: this.company.businessName,
					description:
						this.company.textDetails.shortDetails.substring(0, 150),
					image: this.company.businessLogo,
				},
				twitter: {
					title: this.company.businessName,
					description:
						this.company.textDetails.shortDetails.substring(0, 150),
					image: this.company.businessLogo,
				},
			};
		},
		methods: {
			switcher() {
				axios
					.get(
						window.location.origin +
							'/frontpage-api/company/' +
							this.$route.params.id
					)
					.then((response) => {
						var jsn = JSON.parse(response.data.json_data);
						this.company.businessLogo =
							'/company-images/' + response.data.image;
						this.company.businessName = response.data.name;
						this.company.establishDate =
							response.data.establish_date;
						this.company.ceo = jsn.ceo_of_the_company;
						this.company.address.officeName = jsn.address;
						this.company.mail = 'mailto:' + jsn.support_email;
						this.company.emailName = jsn.support_email;
						this.company.mobile = jsn.support_phone_number;
						this.company.website = jsn.website;
						this.company.products = response.data.products;
						this.company.capacity = response.data.production_cap;
						this.company.manpower = response.data.manpower;
						this.company.textDetails.details =
							response.data.description;
						this.company.textDetails.shortDetails =
							response.data.short_details;
						this.company.social.facebook = jsn.facebook;
					});

				// Lightbox api
				this.photos(this.page);
			},
			photos(page) {
				this.images = [];
				axios
					.get(
						window.location.origin +
							'/frontpage-api/company-images/' +
							this.$route.params.id
					)
					.then((res) => {
						res.data.forEach((item) => {
							this.images.push({
								src: item.src,
								title: item.name,
							});
						});
					});
			},
		},
		created() {
			this.switcher();
			this.$watch(
				() => this.$route.params,
				(toParams, PreviousParams) => {
					this.switcher();
				}
			);
		},
		mounted() {},
	};
</script>
