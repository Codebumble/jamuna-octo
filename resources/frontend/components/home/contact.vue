<template>
	<section class="py-4 overflow-hidden">
		<div class="contact relative">
			<div class="bg-image h-[42rem] md:h-108 w-full">
				<img :src="bgImg" alt="" class="w-full h-full object-cover" />
			</div>
			<div class="form bg-white w-10/12 md:w-5/12 lg:w-1/3 h-110 md:h-104 pt-6 rounded-xl absolute top-8 right-[8.5%] md:right-8">
				<div class="heading">
					<h2
						class="
							text-gray-800 text-center text-xl
							lg:text-4xl
							font-bold
							leading-snug
							uppercase
						">
						contact us
					</h2>
					<p
						class="
							text-base text-center
							leading-snug
							py-4
							text-gray-400
							uppercase
						">
						together can
					</p>
				</div>
				<div class="grid md:gap-6">
					<div class="mt-5 md:mt-0">
						<form
							action="/frontpage-api/contact-page-mail-now"
							method="POST">
							<input type="hidden" name="_token" :value="csrf" />
							<div class="">
								<div class="px-4 py-5 space-y-6 sm:p-6">
									<div class="grid grid-cols-4 gap-6">
										<div class="col-span-4 sm:col-span-2">
											<div
												class="
													mt-1
													flex
													rounded-md
													shadow-sm
												">
												<input
													type="text"
													name="c[name]"
													id="name"
													class="
														focus:ring-red-500
														focus:border-red-500
														flex-1
														block
														w-full
														rounded-md
														sm:text-sm
														border-gray-300
													"
													placeholder="Name" />
											</div>
										</div>
										<div class="col-span-4 sm:col-span-2">
											<div
												class="
													mt-1
													flex
													rounded-md
													shadow-sm
												">
												<input
													type="tel"
													pattern="[0-9]{4}[0-9]{3}[0-9]{4}"
													name="c[phone]"
													id="phone"
													class="
														focus:ring-red-500
														focus:border-red-500
														flex-1
														block
														w-full
														rounded-md
														sm:text-sm
														border-gray-300
													"
													placeholder="Mobile Number (Ex: 0123-456-7890)" />
											</div>
										</div>
									</div>
									<div class="grid gap-6">
										<div class="">
											<div
												class="
													mt-1
													flex
													rounded-md
													shadow-sm
												">
												<input
													type="email"
													name="c[email]"
													id="email"
													class="
														focus:ring-red-500
														focus:border-red-500
														flex-1
														block
														w-full
														rounded-md
														sm:text-sm
														border-gray-300
													"
													placeholder="Email (Ex: alex@example.com)" />
											</div>
										</div>
									</div>
									<div class="grid gap-6">
										<div class="">
											<div
												class="
													mt-1
													flex
													rounded-md
													shadow-sm
												">
												<input
													type="text"
													name="c[subject]"
													id="email"
													class="
														focus:ring-red-500
														focus:border-red-500
														flex-1
														block
														w-full
														rounded-md
														sm:text-sm
														border-gray-300
													"
													placeholder="Subject (Ex: Contacting for some query)" />
											</div>
										</div>
									</div>

									<div>
										<div class="mt-1">
											<textarea
												id="about"
												name="c[about]"
												rows="3"
												class="
													shadow-sm
													focus:ring-red-500
													focus:border-red-500
													mt-1
													block
													w-full
													sm:text-sm
													border border-gray-300
													rounded-md
												"
												placeholder="Enter your message here..." />
										</div>
									</div>
									<div class="px-4 py-3 text-center">
										<button
											type="submit"
											class="
												inline-flex
												justify-center
												py-2
												px-6
												border border-transparent
												hover:border-red-600
												shadow-sm
												text-sm
												font-bold
												rounded-full
												text-white
												hover:text-red-600
												bg-red-600
												hover:bg-white
												transition-all
												uppercase
												mx-auto
											">
											Send Message
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
// @import '../../assets/scss/variables/contact';
</style>

<script>
export default {
	data() {
		return {
			csrf: document
				.querySelector('meta[name="csrf-token"]')
				.getAttribute('content'),
			bgImg: 'https://images.unsplash.com/photo-1661961112951-f2bfd1f253ce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=872&q=80',
		};
	},
	mounted() {},

	setup() {},
};
</script>
