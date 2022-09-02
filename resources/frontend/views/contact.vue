<template>
	<contact />
</template>

<script>
	import contact from '../components/contact/contact';
	export default {
		components: {
			contact,
		},
		mounted() {
			document.title = 'Contact | Jamuna Group'
		},

	};
</script>
