<template>
	<eventDetails :data="eventDetail" />
</template>

<script>
	import { useHead } from '@vueuse/head';
	import eventDetails from '../components/global/event-details';
	export default {
		components: {
			eventDetails,
		},
		data() {
			return {
				eventDetail: {
					eventTitle:
						'Jamuna group signs a new agreement with a new company',
					by: 'Jamuna Group',
					location: 'Chittagong, Bangladesh',
					category: 'Event',
					time: 'Today',
					detail: 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, earum! Enim nam expedita modi sequi cupiditate excepturi alias explicabo dignissimos eaque illo numquam hic, aut fuga ab temporibus sunt assumenda dicta dolorem repudiandae nulla perferendis labore omnis! Libero voluptatem modi eveniet, deserunt quibusdam facere possimus fuga temporibus? Laboriosam, dolorum expedita?',
				},
			};
		},
		setup() {
			// useHead({
			// 	title: 'Founder | Jamuna Group',
			// 	meta: [
			// 		{
			// 			name: `description`,
			// 			content: `blalala`,
			// 		},
			// 		{
			// 			name: `keywords`,
			// 			content: `codebumble`,
			// 		},
			// 	],
			// });
		},
	};
</script>
