<template>
	<section class="contact angled upper-end">
		<div class="container pb-8">
			<div
				class="flex flex-col lg:flex-row lg:w-8/12 w-full mx-auto rounded-xl overflow-hidden border border-slate-100 shadow-lg flex-wrap bg-slate-50">
				<div class="w-full xl:basis-2/4">
					<iframe
						style="border: 0"
						class="w-full h-[250px] xl:h-full"
						loading="lazy"
						allowfullscreen
						referrerpolicy="no-referrer-when-downgrade"
						src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDkCIWjlW4STwE-Zo1qVpGcUQZBJxHEfj0&q=Jamuna+Group+Head+Office">
					</iframe>
				</div>
				<div
					class="w-full flex flex-col justify-center gap-4 p-4 lg:p-16 xl:basis-2/4">
					<div class="flex gap-4">
						<div class="mt-1">
							<i
								class="fas fa-map-marker-alt text-xl text-red-600"></i>
						</div>
						<div class="flex flex-col">
							<h2 class="text-xl font-bold text-gray-800">
								Address
							</h2>
							<span class="block">{{ data.location }}</span>
							<span class="block">{{ data.cityCountry }}</span>
						</div>
					</div>
					<div class="flex gap-4">
						<div class="mt-1">
							<i
								class="fas fa-phone-alt text-xl text-red-600"></i>
						</div>
						<div class="flex flex-col">
							<h2 class="text-xl font-bold text-gray-800">
								Phone
							</h2>
							<span class="block">{{ data.phonePrimary }}</span>
							<span class="block">{{ data.phoneSecondary }}</span>
						</div>
					</div>
					<div class="flex gap-4">
						<div class="mt-1">
							<i class="fas fa-at text-xl text-red-600"></i>
						</div>
						<div class="flex flex-col">
							<h2 class="text-xl font-bold text-gray-800">
								Email
							</h2>
							<a
								href="mailto:{{data.mailPrimary}}"
								class="block">
								{{ data.mailPrimary }}
							</a>
							<a
								href="mailto:{{data.mailSecondary}}"
								class="block"
								>{{ data.mailSecondary }}</a
							>
						</div>
					</div>
				</div>
			</div>

			<div class="py-20">
				<div class="heading">
					<h2
						class="text-gray-800 text-center text-xl lg:text-4xl font-bold leading-snug">
						Drop Us a Line
					</h2>
					<p
						class="text-base text-center leading-snug py-4 text-gray-400">
						Reach out to us from our contact form and we will get
						back to you shortly.
					</p>
				</div>
				<div class="grid lg:w-6/12 mx-auto md:gap-6">
					<div class="mt-5 md:mt-0">
						<form
							action="#"
							method="POST">
							<div class="">
								<div class="px-4 py-5 space-y-6 sm:p-6">
									<div class="grid grid-cols-4 gap-6">
										<div class="col-span-4 sm:col-span-2">
											<div
												class="mt-1 flex rounded-md shadow-sm">
												<input
													type="text"
													name="name"
													id="name"
													class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
													placeholder="Name" />
											</div>
										</div>
										<div class="col-span-4 sm:col-span-2">
											<div
												class="mt-1 flex rounded-md shadow-sm">
												<input
													type="tel"
													pattern="[0-9]{4}[0-9]{3}[0-9]{4}"
													name="phone"
													id="phone"
													class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
													placeholder="Mobile Number (Ex: 0123-456-7890)" />
											</div>
										</div>
									</div>
									<div class="grid gap-6">
										<div class="">
											<div
												class="mt-1 flex rounded-md shadow-sm">
												<input
													type="email"
													name="email"
													id="email"
													class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
													placeholder="Email (Ex: alex@example.com)" />
											</div>
										</div>
									</div>
									<div class="grid gap-6">
										<div class="">
											<div
												class="mt-1 flex rounded-md shadow-sm">
												<input
													type="email"
													name="email"
													id="email"
													class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
													placeholder="Subject (Ex: Contacting for some query)" />
											</div>
										</div>
									</div>

									<div>
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
											class="inline-flex justify-center py-2 px-4 border border-transparent hover:border-red-600 shadow-sm text-sm font-medium rounded-full text-white hover:text-red-600 bg-red-600 hover:bg-white transition-all">
											Send
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
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
