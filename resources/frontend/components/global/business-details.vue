<template>
	<section class="businessDetails pb-20">
		<div class="container">
			<div class="flex flex-col lg:flex-row gap-8">
				<div class="w-full lg:w-4/12 flex flex-col gap-8">
					<div
						class="border border-slate-100 p-8 w-full shadow-lg rounded-md overflow-hidden">
						<img
							:src="data.businessLogo"
							:alt="data.alt"
							class="w-full max-w-[338px] max-h-[156px] object-cover" />
					</div>
					<div
						class="border border-slate-100 p-8 w-full shadow-lg rounded-md overflow-hidden businessInfo">
						<table>
							<tr>
								<th>Company Name</th>
								<td>{{ data.companyName }}</td>
							</tr>
							<tr>
								<th>Establish Date</th>
								<td>{{ data.establishDate }}</td>
							</tr>
							<tr>
								<th>Name of The CEO</th>
								<td>{{ data.ceo }}</td>
							</tr>
							<tr>
								<th>Address</th>
								<td>
									<span class="block">{{
										data.address.officeName
									}}</span>
									<span class="block">{{
										data.address.officeRoad
									}}</span>
									<span class="block">{{
										data.address.location
									}}</span>
									<span class="block">{{
										data.address.country
									}}</span>
								</td>
							</tr>
							<tr>
								<th>Support Email</th>
								<td>
									<a
										:href="data.mail"
										class="underline decoration-dotted hover:decoration-solid decoration-slate-400 hover:decoration-red-600 underline-offset-4 hover:text-red-600 transition-all"
										>{{ data.emailName }}</a
									>
								</td>
							</tr>
							<tr>
								<th>Support Phone</th>
								<td>
									<a
										:href="data.mobile"
										class="underline decoration-dotted hover:decoration-solid decoration-slate-400 hover:decoration-red-600 underline-offset-4 hover:text-red-600 transition-all"
										>{{ data.mobile }}</a
									>
								</td>
							</tr>
							<tr>
								<th>Website</th>
								<td>
									<a
										:href="data.website"
										class="underline decoration-dotted hover:decoration-solid decoration-slate-400 hover:decoration-red-600 underline-offset-4 hover:text-red-600 transition-all"
										>{{ data.companyName }}</a
									>
								</td>
							</tr>
							<tr class="items-center">
								<th>Social Media</th>
								<td>
									<ul class="flex">
										<li class="">
											<a
												:href="data.social.facebook"
												class="hover:text-blue-600 transition-all"
												><i class="fab fa-facebook"></i
											></a>
										</li>
										<li class="">
											<a
												:href="data.social.instagram"
												class="hover:text-red-600 transition-all"
												><i class="fab fa-instagram"></i
											></a>
										</li>
										<li class="">
											<a
												:href="data.social.linkedin"
												class="hover:text-[#0077b5] transition-all"
												><i class="fab fa-linkedin"></i
											></a>
										</li>
									</ul>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div
					class="w-full lg:w-8/12 rounded-md shadow-lg border border-slate-100 p-8 overflow-hidden businessDetails">
					<h2
						class="font-bold text-lg underline decoration-wavy decoration-gray-800 text-gray-800 underline-offset-4">
						About this Business
					</h2>
					<p
						v-if="data.textSummary"
						v-for="summary in data.textDetails">
						{{ summary.details }}
					</p>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_business-details';
</style>

<script>
	export default {
		name: 'businessDetails',
		props: {
			data: Object,
		},
	};
</script>
