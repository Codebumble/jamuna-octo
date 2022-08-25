<template>
	<section class="py-28">
		<div class="container">
			<div class="upper-part">
				<div class="w-full lg:w-8/12 mx-auto">
					<div>
						<img
							src="https://pixelprime.co/themes/jobster/images/office-1.jpg"
							alt=""
							class="rounded-md w-full h-44 lg:h-96 object-cover" />
					</div>
					<div
						class="absolute w-28 lg:w-40 h-28 lg:h-40 border-2 border-slate-100 rounded-xl lg:-mt-24 -mt-14 middle overflow-hidden bg-white">
						<img
							src="/frontend/images/logo/microsoft.svg"
							alt=""
							class="" />
					</div>
				</div>
				<div class="pt-28 text-center">
					<h2
						class="font-bold text-gray-800 text-3xl leading-snug pb-1">
						Technical Support Engineer
					</h2>
					<p class="mb-4">
						by
						<a
							href="#"
							class="font-bold"
							>Microsoft</a
						>
						in Dhaka, Bangladesh
					</p>
					<button
						class="font-bold rounded-full px-4 py-2 bg-red-600 text-white hover:bg-white hover:text-red-600 border border-red-600 inline-block"
						@click="toggleModal">
						Apply Now
					</button>
					<Modal
						:isActiveModal="isActiveModal"
						@close="toggleModal">
						<div class="apply relative pt-4">
							<span
								class="close"
								@click="toggleModal"
								>&times;</span
							>
							<form
								class="pt-6"
								@submit.prevent="submitResume">
								<div
									class="grid grid-cols-1 md:grid-cols-2 gap-x-0 md:gap-x-4">
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="name"
												id="name"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Name"
												required
												v-model="name" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<div
												class="col-span-6 sm:col-span-3">
												<select
													id="division"
													name="division"
													autocomplete="division-name"
													class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
													v-model="division"
													@change="selectDivision"
													required>
													<option
														v-for="value in Object.keys(
															address
														)"
														:value="value">
														{{ value }}
													</option>
												</select>
											</div>
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<div
												class="col-span-6 sm:col-span-3">
												<select
													id="district"
													name="district"
													autocomplete="district-name"
													class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
													@change="selectDistrict"
													v-model="district"
													required>
													<option v-if="isDistrict">
														{{ district }}
													</option>
													<option
														v-for="district in districts"
														:value="district">
														{{ district }}
													</option>
												</select>
											</div>
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<div
												class="col-span-6 sm:col-span-3">
												<select
													id="subdistrict"
													name="subdistrict"
													autocomplete="subdistrict-name"
													class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
													v-model="subdistrict"
													required>
													<option
														v-if="isSubdistrict">
														{{ subdistrict }}
													</option>
													<option
														v-for="subdistrict in subdistricts">
														{{ subdistrict }}
													</option>
												</select>
											</div>
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<div
												class="col-span-6 sm:col-span-3">
												<select
													id="qualification"
													name="qualification"
													autocomplete="qualification-name"
													class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
													v-model="qualification"
													required>
													<option>
														Qualification
													</option>
													<option
														v-for="qualification in qualifications">
														{{ qualification }}
													</option>
												</select>
											</div>
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<div
												class="col-span-6 sm:col-span-3">
												<select
													id="experience"
													name="experience"
													autocomplete="experience-name"
													class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
													v-model="experience"
													required>
													<option>
														Experience (Years)
													</option>
													<option
														v-for="experience in 20">
														{{
															experience.toString()
																.length > 1
																? experience
																: '0' +
																  experience
														}}
													</option>
												</select>
											</div>
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="university"
												id="experience"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="University (Optional)"
												v-model="university" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="salary"
												id="salary"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Expected Salary"
												v-model="salary"
												required />
										</div>
									</div>
								</div>
								<div class="input-group">
									<div class="input-item">
										<div>
											<div
												class="mt-1 flex justify-center px-4 pt-3 pb-4 border-2 border-gray-300 border-dashed rounded-md">
												<div
													class="space-y-1 text-center">
													<svg
														xmlns="http://www.w3.org/2000/svg"
														class="mx-auto h-8 w-8 text-gray-400"
														viewBox="0 0 24 24"
														fill="none"
														stroke="currentColor"
														stroke-width="2"
														stroke-linecap="round"
														stroke-linejoin="round">
														<path
															d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
														<polyline
															points="13 2 13 9 20 9"></polyline>
													</svg>
													<div
														class="flex text-sm text-gray-600">
														<label
															for="file-upload"
															class="relative cursor-pointer bg-white rounded-md font-medium text-red-500 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
															<span
																>Upload a
																file</span
															>
															<input
																id="file-upload"
																name="file-upload"
																type="file"
																class="sr-only"
																accept="application/pdf"
																@change="
																	onFileChange
																"
																required />
														</label>
														<p class="pl-1">
															or drag and drop
														</p>
													</div>
													<p
														class="text-xs text-gray-500">
														PDF
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<button
									type="submit"
									class="inline-flex justify-center pt-2 px-4 border border-transparent hover:border-red-600 shadow-sm text-sm rounded-full text-white hover:text-red-600 bg-red-600 hover:bg-white transition-all w-full h-12 items-center font-bold">
									Send
								</button>
							</form>
						</div>
					</Modal>
					<div class="pt-4">
						<span class="category">Customer Service</span>
						<span class="time">4 Days ago</span>
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
							<!-- <span>{{ network.name }}</span> -->
						</ShareNetwork>
					</div>
				</div>
			</div>
			<!-- upper part closed -->
			<div
				class="grid lg:grid-cols-3 gap-6 w-full lg:w-10/12 mx-auto overview pt-20">
				<div class="lg:col-span-2">
					<h4 class="text-gray-800 font-bold text-xl mb-4">
						Overview
					</h4>
					<p class="text-base text-gray-600 mb-2">
						As a Product Designer, you will work within a Product
						Delivery Team fused with UX, engineering, product and
						data talent. You will help the team design beautiful
						interfaces that solve business challenges for our
						clients. We work with a number of Tier 1 banks on
						building web-based applications for AML, KYC and
						Sanctions List management workflows. This role is ideal
						if you are looking to segue your career into the FinTech
						or Big Data arenas.
					</p>
					<h4 class="text-gray-800 font-bold text-xl my-4">
						Responsabilities
					</h4>
					<ul class="list-disc list-inside text-gray-600">
						<li>
							Be involved in every step of the product design
							cycle from discovery to developer handoff and user
							acceptance testing.
						</li>
						<li>
							Work with BAs, product managers and tech teams to
							lead the Product Design
						</li>
						<li>
							Maintain quality of the design process and ensure
							that when designs are translated into code they
							accurately reflect the design specifications.
						</li>
						<li>
							Accurately estimate design tickets during planning
							sessions.
						</li>
						<li>
							Contribute to sketching sessions involving
							non-designersCreate, iterate and maintain UI
							deliverables including sketch files, style guides,
							high fidelity prototypes, micro interaction
							specifications and pattern libraries.
						</li>
					</ul>
					<h4 class="text-gray-800 font-bold text-xl my-4">
						Requirements
					</h4>

					<ul class="list-disc list-inside text-gray-600">
						<li>
							4+ years of system administration experience with
							the Microsoft Server platform (2012/2016, Microsoft
							IIS, Active Directory)
						</li>
						<li>
							3+ years of hands-on system administration
							experience with AWS (EC2, Elastic Load Balancing,
							Multi AZ, etc.)
						</li>
						<li>4+ years of SQL Server, MySQL</li>
					</ul>
					<h4 class="text-gray-800 font-bold text-xl my-4">Skills</h4>
					<ul class="list-disc list-inside text-gray-600">
						<li>
							Programming experience developing web applications
							with the Microsoft .NET stack and a basic knowledge
							of SQL
						</li>
						<li>
							Development experience with Angular, Node.JS, or
							ColdFusion
						</li>
						<li>HTML, CSS, XHTML, XML</li>
					</ul>
					<h4 class="text-gray-800 font-bold text-xl my-4">
						Attached Files
					</h4>
					<ul class="list-disc list-inside text-gray-600">
						<li>
							<a
								href="#"
								class="underline decoration-dotted hover:decoration-solid decoration-slate-400 hover:decoration-red-600 underline-offset-4 hover:text-red-600 transition-all"
								>Download the attached file</a
							>
						</li>
					</ul>
				</div>
				<div class="flex flex-col gap-6">
					<div class="box">
						<div class="info">
							<span>Experience</span>
							<h4>Minimum 1 Year</h4>
						</div>
						<div class="info">
							<span>Work Level</span>
							<h4>Senior Level</h4>
						</div>
						<div class="info">
							<span>Employment Type</span>
							<h4>Full Time</h4>
						</div>
						<div class="info">
							<span>Salary</span>
							<h4>$35k / year</h4>
						</div>
					</div>
					<div class="box">
						<div class="flex gap-4 items-center mb-4">
							<div>
								<img
									src="/frontend/images/logo/microsoft.svg"
									alt=""
									class="rounded-lg w-10 h-10" />
							</div>
							<div>
								<h4 class="font-bold text-xl">Microsoft</h4>
								<a
									href="#"
									class="underline decoration-dotted underline-offset-4 decoration-slate-400 hover:text-red-600 hover:decoration-red-600 transition-all text-sm text-gray-600"
									>View Website</a
								>
							</div>
						</div>
						<div class="info">
							<span>Industry</span>
							<h4>Software</h4>
						</div>
						<div class="info">
							<span>Company size</span>
							<h4>50 - 100</h4>
						</div>
						<div class="info">
							<span>Founded in</span>
							<h4>2005</h4>
						</div>
						<div class="info">
							<span>Phone</span>
							<h4>0124 456 789</h4>
						</div>
						<div class="info">
							<span>Email</span>
							<h4>office@illuminate.com</h4>
						</div>
						<div class="info">
							<span>Location</span>
							<h4>San Francisco, CA</h4>
						</div>
						<div class="info">
							<span>Website</span>
							<h4><a href="#">www.Illuminati.com</a></h4>
						</div>

						<ul class="flex gap-4">
							<li>
								<a
									href=""
									class="hover:text-blue-600 transition-all text-[1.3rem] text-gray-800">
									<i class="fab fa-facebook"></i>
								</a>
							</li>
							<li>
								<a
									href=""
									class="hover:text-red-600 transition-all text-[1.3rem] text-gray-800">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							<li>
								<a
									href=""
									class="hover:text-[#0077b5] transition-all text-[1.3rem] text-gray-800">
									<i class="fab fa-linkedin"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../assets/scss/variables/_career.scss';
	@import '../assets/scss/variables/apply';
</style>

<script>
	// import { useHead } from '@vueuse/head';
	import Modal from '../components/global/modal';
	import { ref } from 'vue';
	import { address, qualifications } from '../util/address.js';
	export default {
		components: {
			Modal,
		},
		data() {
			return {
				sharing: {
					url: window.location.origin + this.$route.path,
					title: 'Say hi to Vite! A brand new, extremely fast development setup for Vue.',
					description:
						'This week, I’d like to introduce you to "Vite", which means "Fast". It’s a brand new development setup created by Evan You.',
					quote: "The hot reload is so fast it's near instant. - Evan You",
					hashtags: 'vuejs,vite,javascript',
					twitterUser: 'youyuxi',
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
						network: 'twitter',
						name: 'Twitter',
						icon: 'fab fa-twitter',
					},
					{
						network: 'whatsapp',
						name: 'Whatsapp',
						icon: 'fab fa-whatsapp',
					},
				],
			};
		},
		mounted() {
			console.log(this.$route.params.id);
		},
		setup() {
			const isDistrict = ref(true);
			const isSubdistrict = ref(true);
			const isActiveModal = ref(false);
			const districts = ref([]);
			const subdistricts = ref([]);

			const name = ref('');
			const division = ref('Division');
			const district = ref('District');
			const subdistrict = ref('Subdistrict');
			const qualification = ref('Qualification');
			const experience = ref('Experience (Years)');
			const university = ref('');
			const salary = ref('');
			const pdf = ref();

			const toggleModal = () => {
				isActiveModal.value = !isActiveModal.value;
				if (isActiveModal.value)
					document.body.style.overflowY = 'hidden';
				else document.body.style.overflowY = 'scroll';
			};
			const selectDivision = () => {
				districts.value = Object.keys(address[division.value]);
				district.value = 'District';
				subdistrict.value = 'Subdistrict';
				isDistrict.value = false;
				if (division.value === 'Division') {
					subdistricts.value = ['Subdistrict'];
					isSubdistrict.value = false;
					return;
				} else {
					isSubdistrict.value = true;
				}
			};
			const selectDistrict = () => {
				subdistricts.value = [
					...address[division.value][district.value],
				];
				if (district.value === 'District') {
					subdistricts.value = ['Subdistrict'];
					isSubdistrict.value = false;
					return;
				}
			};
			const submitResume = () => {
				const userData = {
					name: name.value,
					division: division.value,
					district: district.value,
					subdistrict: subdistrict.value,
					qualification: qualification.value,
					experience: experience.value,
					university: university.value,
					salary: salary.value,
					pdf: pdf.value,
				};
				if (
					!name.value ||
					division.value === 'Division' ||
					district.value === 'District' ||
					subdistrict.value === 'Subdistrict' ||
					experience.value === 'Experience (Years)'
				) {
					return;
				} else {
					console.log(userData);
				}
			};
			const onFileChange = (e) => {
				var files = e.target.files || e.dataTransfer.files;
				if (!files.length) return;
				pdf.value = files[0];
			};
			return {
				isActiveModal,
				toggleModal,
				selectDivision,
				selectDistrict,
				onFileChange,
				submitResume,
				address,
				districts,
				subdistricts,
				isDistrict,
				isSubdistrict,
				qualifications,
				name,
				division,
				district,
				subdistrict,
				qualification,
				experience,
				university,
				salary,
			};
		},
	};
</script>
<style lang="scss">
	.close {
		@apply absolute top-4 right-8 text-3xl font-bold cursor-pointer text-gray-500;
	}
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
