<template>
	<contactForm :data="contact" />
</template>

<script>
	import contactForm from '../global/contact-form.vue';
	export default {
		components: {
			contactForm,
		},
		data() {
			return {
				contact: {},
			};
		},
		async mounted(){

				const result = await axios.get(window.location.origin + '/frontpage-api/contact-us-api')
			this.contact=await result.data
		}
	};
</script>
