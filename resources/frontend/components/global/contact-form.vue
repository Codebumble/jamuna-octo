<template>
	<section class="contact angled upper-end">
		<div class="container pb-8">
			<div class="md:grid md:grid-cols-4 md:gap-6">
				<div class="mt-5 md:mt-0 md:col-span-2">
					<form
						action="#"
						method="POST">
						<div class="shadow sm:rounded-md sm:overflow-hidden">
							<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
								<div class="grid grid-cols-4 gap-6">
									<div class="col-span-2 sm:col-span-2">
										<label
											for="name"
											class="block text-sm font-medium text-gray-800">
											Name:
										</label>
										<div
											class="mt-1 flex rounded-md shadow-sm">
											<input
												type="text"
												name="name"
												id="name"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Ex: Alex" />
										</div>
									</div>
									<div class="col-span-2 sm:col-span-2">
										<label
											for="phone"
											class="block text-sm font-medium text-gray-800">
											Mobile:
										</label>
										<div
											class="mt-1 flex rounded-md shadow-sm">
											<input
												type="tel"
												pattern="[0-9]{4}[0-9]{3}[0-9]{4}"
												name="phone"
												id="phone"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Ex: 0123-456-7890" />
										</div>
									</div>
								</div>
								<div class="grid gap-6">
									<div class="">
										<label
											for="email"
											class="block text-sm font-medium text-gray-800">
											Email:
										</label>
										<div
											class="mt-1 flex rounded-md shadow-sm">
											<input
												type="email"
												name="email"
												id="email"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Ex: alex@example.com" />
										</div>
									</div>
								</div>
								<div class="grid gap-6">
									<div class="">
										<label
											for="email"
											class="block text-sm font-medium text-gray-800">
											Subject:
										</label>
										<div
											class="mt-1 flex rounded-md shadow-sm">
											<input
												type="email"
												name="email"
												id="email"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Ex: Contacting for some query" />
										</div>
									</div>
								</div>

								<div>
									<label
										for="about"
										class="block text-sm font-medium text-gray-700">
										Message
									</label>
									<div class="mt-1">
										<textarea
											id="about"
											name="about"
											rows="3"
											class="shadow-sm focus:ring-red-500 focus:border-red-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
											placeholder="Enter your message here..." />
									</div>
								</div>
								<div class="px-4 py-3 text-right">
									<button
										type="submit"
										class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
										Save
									</button>
								</div>
							</div>
							<!-- <div
								class="px-4 py-3 bg-gray-50 text-right sm:px-6"></div> -->
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../../assets/scss/variables/_contact';
</style>

<script>
	export default {
		props: {
			data: Object,
		},
	};
</script>
