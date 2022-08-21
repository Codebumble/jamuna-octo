<template>
	<breadcrumb :data="breadcrumb" />
	<contact />
</template>

<script>
	import breadcrumb from '../components/global/breadcrumb';
	import contact from '../components/contact/contact';
	export default {
		components: {
			breadcrumb,
			contact,
		},
		data() {
			return {
				breadcrumb: {
					pageTitle: 'Contact',
					pageDesc:
						'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum animi aliquam voluptates harum aspernatur eveniet velit doloribus aliquid adipisci suscipit?',
				},
			};
		},
		setup() {

		},
	};
</script>
