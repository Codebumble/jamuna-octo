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
				contact: {
					mapKey: 'AIzaSyDkCIWjlW4STwE-Zo1qVpGcUQZBJxHEfj0',
					mapMarker: 'Jamuna+Group+Head+Office',
					location: 'Moonshine St. 14/05 Light City,',
					cityCountry: 'London, UK',
					phonePrimary: '00 (123) 456 78 90',
					phoneSecondary: '00 (987) 654 32 10',
					mailPrimary: 'Hello@jamuna.com',
					mailSecondary: 'Support@jamuna.com',
				},
			};
		},
	};
</script>
