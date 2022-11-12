<template>
	<businessDetails :data="company" />
</template>

<script>
import { defineAsyncComponent } from 'vue';
const businessDetails = defineAsyncComponent({
	loader: () => import('../components/global/product-details'),
	timeout: 2000,
});
export default {
	components: {
		businessDetails,
	},
	data() {
		return {
			company: {
				id: 7,
				name: '',
				company: '',
				image: '',
				minimum_order: '',
				estimated_delivery: '',
				short_description: '',
				description: '',
				price: '',
				stock: '',
				json_data: '',
			},
		};
	},
	methods: {
		switcher() {
			if (this.$route.path.includes('/product')) {
				axios
					.get(
						window.location.origin +
							'/frontpage-api/product-details/' +
							this.$route.params.id
					)
					.then((response) => {
						this.company.name = response.data.name;
						this.company.company = response.data.company;
						this.company.image = response.data.image;
						this.company.minimum_order =
							response.data.minimum_order;
						this.company.estimated_delivery =
							response.data.estimated_delivery;
						this.company.short_description =
							response.data.short_description;
						this.company.description = response.data.description;
						this.company.price = response.data.price;
						this.company.stock = response.data.stock;
						this.company.json_data = response.data.json_data;
					})
					.catch(() => {
						this.$router.push({ name: 'not-found' });
					});
			}
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
