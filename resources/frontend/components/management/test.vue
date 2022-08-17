<template>
	<MatchMedia v-slot="{ mobile }">
		<p v-if="mobile">mobile</p>
		<p v-else>desktop</p>
	</MatchMedia>
</template>

<script>
	import { MatchMedia } from 'vue-component-media-queries';
	// export default {
	// 	components: { MatchMedia },
	// };
	export default {
		// name: 'AppLayout',
		components: {
			MatchMedia,
			//   MobileLayout,
			//   DesktopLayout,
		},
	};
</script>
