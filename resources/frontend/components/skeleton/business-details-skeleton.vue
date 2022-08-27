<template>
	<section class="businessDetails pb-28 pt-32">
		<div class="container">
			<div class="flex flex-col lg:flex-row gap-8">
				<div class="w-full lg:w-4/12 flex flex-col gap-8">
					<div
						class="border border-slate-100 p-8 w-full shadow-lg rounded-md overflow-hidden">
						<div
							class="w-full max-w-[338px] max-h-[156px] h-[156px] bg-gray-100 mx-auto object-cover"></div>
					</div>
					<div
						class="border border-slate-100 py-6 px-4 w-full shadow-lg rounded-md overflow-hidden businessInfo">
						<table>
							<tr>
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
							<tr>
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
							<tr>
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
							<tr>
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
							<tr>
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
							<tr>
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
							<tr>
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
							<tr>
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
							<tr>
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
							<tr>
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
							<tr class="items-center">
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
							<tr>
								<th class="bg-gray-100 h-6 mb-4 w-80 mr-3"></th>
								<td class="bg-gray-100 h-6 mb-4 w-80"></td>
							</tr>
						</table>
					</div>
				</div>
				<div
					class="w-full lg:w-8/12 rounded-md shadow-lg border border-slate-100 p-8 overflow-hidden businessDetails">
					<h2 class="bg-gray-100 h-6 mb-4 w-80"></h2>
					<div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
						<div class="bg-gray-100 h-6 mb-4 w-full"></div>
					</div>

					<div class="company-gallery pt-8">
						<div
							class="grid grid-cols-1 lg:grid-cols-4 2xl:gap-3 md:grid-cols-2 gap-5 pb-8">
							<div class="image">
								<div class="thumbnail">
									<div></div>
								</div>
							</div>
							<div class="image">
								<div class="thumbnail">
									<div></div>
								</div>
							</div>
							<div class="image">
								<div class="thumbnail">
									<div></div>
								</div>
							</div>
							<div class="image">
								<div class="thumbnail">
									<div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss" scoped>
	@import '../../assets/scss/variables/_business-details';
	@import '../../assets/scss/variables/company-gallery';
	.thumbnail {
		@apply h-48 lg:h-40 xl:h-48 xl:w-44 2xl:h-44 2xl:w-[13.5rem] lg:w-32 md:w-80 md:mx-auto;
		div {
			@apply h-full w-full object-cover rounded transition-all duration-500 bg-gray-100;
		}
	}
</style>

<script>
	export default {};
</script>
