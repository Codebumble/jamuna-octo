<template>
	<section class="py-28">
		<div class="container">
			<div class="upper-part">
				<div class="w-full lg:w-8/12 mx-auto">
					<div>
						<img
							:src="data.image"
							:alt="data.eventTitle"
							class="rounded-md w-full h-44 lg:h-96 object-cover" />
					</div>
				</div>
				<div class="pt-8 text-center">
					<h2
						class="font-bold text-gray-800 text-3xl leading-snug pb-1">
						{{ data.eventTitle }}
					</h2>
					<p class="mb-0">
						by
						<a
							href="#"
							class="font-bold"
							>{{ data.by }}</a
						>
						in {{ data.location }}
					</p>
					<div class="pt-4">
						<span class="category">{{ data.category }}</span>
						<span class="time">{{ data.time }}</span>
					</div>
					<div class="share">
						<ShareNetwork
							v-for="network in networks"
							:network="network.network"
							:key="network.network"
							:style="{
								backgroundColor: network.color,
							}"
							:url="sharing.url"
							:title="sharing.title"
							:description="sharing.description"
							:quote="sharing.quote"
							:hashtags="sharing.hashtags"
							:twitterUser="sharing.twitterUser">
							<i :class="network.icon"></i>
						</ShareNetwork>
					</div>
				</div>
			</div>
			<!-- upper part closed -->
			<div class="description">
				<p>
					{{data.detail}}
				</p>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/career';
	@import '../../assets/scss/variables/apply';
</style>

<script>
	export default {
		data() {
			return {
				sharing: {
					url: window.location.origin + this.$route.path,
					title: this.data.eventTitle,
					hashtags: 'JamunaGroup, Bangladesh',
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
						network: 'whatsapp',
						name: 'Whatsapp',
						icon: 'fab fa-whatsapp',
					},
				],
			};
		},
		props:{
			data: Object
		}
	};
</script>
<style lang="scss">
	.share {
		@apply flex items-center text-[1.3rem] gap-3 justify-center content-center py-4;

		a {
			@apply text-gray-800 transition-all;
		}

		.share-network-facebook {
			@apply hover:text-blue-600 transition-all;
		}
		.share-network-linkedin {
			@apply hover:text-[#0077b5] transition-all;
		}
		.share-network-messenger {
			@apply hover:text-[#2f80fe] transition-all;
		}
		.share-network-twitter {
			@apply hover:text-[#1da1f2] transition-all;
		}
		.share-network-whatsapp {
			@apply hover:text-green-600 transition-all;
		}
	}
</style>
