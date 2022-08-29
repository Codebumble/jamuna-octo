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
				</div>
			</div>
			<!-- upper part closed -->
			<div class="description">
				<div class="">
					<span class="text-xs font-bold">{{data.category}} . {{data.time}} . </span>
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
		@apply text-[1.3rem] py-4 inline-block;

		a {
			@apply text-gray-800 transition-all mr-3;
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
