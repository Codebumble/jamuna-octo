<template>
	<eventDetails :data="eventDetail" />
</template>

<script>
	import eventDetails from '../components/global/event-details';
	export default {
		components: {
			eventDetails,
		},
		data() {
			return {
				eventDetail: {
					eventTitle: '',
					by: '',
					location: '',
					category: '',
					time: '',
					detail: '',
					image: ''
				},
			};
		},
		created() {
			axios
			.get(window.location.origin + '/frontpage-api/event-details/'+this.$route.params.id)
			.then((response) => {
				this.eventDetail = {
					eventTitle: response.data.name,
					by: 'Jamuna Group',
					location: response.data.location,
					category: response.data.category,
					time: response.data.time_data,
					detail: response.data.detail,
					image: response.data.image
				}
			});
		},
		metaInfo() {
			return {
				title: this.eventDetail.eventTitle,
				// title: this.FounderDetails.title,
				description: this.eventDetail.detail.substring(0, 150),
				charset: 'utf-8',
				htmlAttrs: {
					lang: 'en',
				},
				og: {
					description: this.eventDetail.detail.substring(0, 150),
					image: '',
				},
				twitter: {
					description: this.eventDetail.detail.substring(0, 150),
					image: '',
				},
			};
		},
	};
</script>
