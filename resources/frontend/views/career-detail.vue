<template>
	<section class="py-28">
		<div class="container">
			<div class="upper-part">
				<div class="w-full lg:w-8/12 mx-auto">
					<div>
						<img
							:src="jobheading.cover"
							:alt="jobheading.by"
							class="rounded-md w-full h-44 lg:h-96 object-cover" />
					</div>
					<div
						class="absolute w-28 lg:w-40 h-28 lg:h-40 border-2 border-slate-100 rounded-xl lg:-mt-24 -mt-14 middle overflow-hidden bg-white flex justify-center items-center">
						<img
							:src="jobheading.complogo"
							:alt="jobheading.by"
							class="p-4" />
					</div>
				</div>
				<div class="pt-28 text-center">
					<h2
						class="font-bold text-gray-800 text-3xl leading-snug pb-1">
						{{ jobheading.jobtitle }}
					</h2>
					<p class="mb-4">
						by
						<a
							href="#"
							class="font-bold"
							>{{ jobheading.by }}</a
						>
						in {{ jobheading.location }}
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
								class="pt-6" @submit.prevent="submitResume">
								<div
									class="grid grid-cols-1 md:grid-cols-2 gap-x-0 md:gap-x-4">
									<div class="input-group">
										<div class="input-item">

											<input
												type="hidden"
												name="new[job_id]"
												:value="jobInfo.id"
												:v-model="job_id"
												/>

											<input
												type="hidden"
												name="_token"
												:value="jobInfo.token"
												:v-model="_token" />

											<input
												type="hidden"
												name="new[company]"
												:value="companyInfo.name"
												:v-model="company" >


											<input
												type="text"
												name="new[name]"
												id="name"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Applicant Name"
												required
												v-model="name" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="new[age]"
												id="age"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Age"
												required
												v-model="age" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<div
												class="col-span-6 sm:col-span-3">
												<select
													id="gender"
													name="new[gender]"
													autocomplete="gender-name"
													class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
													v-model="gender"
													required>
													<option>{{gender}}</option>
													<option>Male</option>
													<option>Female</option>
													<option>Other</option>
												</select>
											</div>
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<div
												class="col-span-6 sm:col-span-3">
												<select
													id="division"
													name="new[division]"
													autocomplete="division-name"
													class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
													v-model="division"
													@change="selectDivision"
													required>
													<option
														v-for="value in Object.keys(
															address
														)"
														:value="value"
														:key="value">
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
													name="new[district]"
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
														:value="district"
														:key="district">
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
													name="new[subdistrict]"
													autocomplete="subdistrict-name"
													class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
													v-model="subdistrict"
													required>
													<option
														v-if="isSubdistrict">
														{{ subdistrict }}
													</option>
													<option
														v-for="subdistrict in subdistricts"
														:key="subdistrict">
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
													name="new[qualifications]"
													autocomplete="qualification-name"
													class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
													v-model="qualification"
													required>
													<option>
														Educational Qualification
													</option>
													<option
														v-for="qualification in qualifications"
														:key="qualification">
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
													name="new[experience]"
													autocomplete="experience-name"
													class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"
													v-model="experience"
													required>
													<option>
														Experience (Years)
													</option>
													<option
														v-for="experience in 20"
														:key="experience">
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
												name="new[expo_salary]"
												id="salary"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Expected Salary"
												v-model="salary"
												required />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="new[phone]"
												id="experience"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Your Mobile Number"
												v-model="mobile" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="email"
												name="new[email]"
												id="salary"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Your Email"
												v-model="email"
												required />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="new[sCountry]"
												id="sCountry"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Study Country (Optional)"
												v-model="sCountry"
												required />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="new[pCompany]"
												id="pCompany"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Previous Company (Optional)"
												v-model="pCompany"
												/>
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
																>Upload your
																CV/Resume</span
															>
															<input
																id="file-upload"
																name="new[file-upload]"
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
															your CV/Resume
														</p>
													</div>
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
						<span class="category">{{ jobheading.category }}</span>
						<span class="time">{{ jobheading.time }}</span>
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
			<div
				class="grid lg:grid-cols-3 gap-6 w-full lg:w-10/12 mx-auto overview pt-20">
				<div class="lg:col-span-2 w-full break-words overflow-hidden description">
					<div v-html="jobdescription.description"></div>
					<ul
						class="list-disc list-inside text-gray-600"
						v-if="
							jobdescription.attachedfilelink &&
							jobdescription.attachedfilelinklabel
						">
						<li>
							<a
								:href="jobdescription.attachedfilelink"
								class="underline decoration-dotted hover:decoration-solid decoration-slate-400 hover:decoration-red-600 underline-offset-4 hover:text-red-600 transition-all"
								>{{ jobdescription.attachedfilelinklabel }}</a
							>
						</li>
					</ul>
				</div>
				<div class="flex flex-col gap-6">
					<div class="box">
						<div class="info">
							<span>Experience</span>
							<h4>{{ jobInfo.experience }}</h4>
						</div>
						<div class="info">
							<span>Employment Type</span>
							<h4>{{ jobInfo.employmentType }}</h4>
						</div>
						<div class="info">
							<span>Salary</span>
							<h4>{{ jobInfo.salary }} / year</h4>
						</div>
						<div class="info">
							<span>Can Apply</span>
							<h4>{{ jobInfo.gander }}</h4>
						</div>
					</div>
					<div class="box">
						<div class="flex gap-4 items-center mb-4">
							<div
								class="w-16 flex justify-center items-center h-[2.8rem] border border-gray-100 bg-white">
								<img
									:src="companyInfo.logo"
									:alt="companyInfo.name"
									class="rounded-lg w-full h-auto p-2" />
							</div>
							<div>
								<h4 class="font-bold text-xl">
									{{ companyInfo.name }}
								</h4>
								<a
									:href="companyInfo.websiteLink"
									class="underline decoration-dotted underline-offset-4 decoration-slate-400 hover:text-red-600 hover:decoration-red-600 transition-all text-sm text-gray-600"
									>View Website</a
								>
							</div>
						</div>
						<div class="info">
							<span>Industry</span>
							<h4>{{ companyInfo.industry }}</h4>
						</div>
						<div class="info">
							<span>Company size</span>
							<h4>{{ companyInfo.companySize }}</h4>
						</div>
						<div class="info">
							<span>Founded in</span>
							<h4>{{ companyInfo.foundedIn }}</h4>
						</div>
						<div class="info">
							<span>Phone</span>
							<h4>{{ companyInfo.phone }}</h4>
						</div>
						<div class="info">
							<span>Email</span>
							<h4>{{ companyInfo.email }}</h4>
						</div>
						<div class="info">
							<span>Location</span>
							<h4>{{ companyInfo.location }}</h4>
						</div>
						<div class="info">
							<span>Website</span>
							<h4>
								<a
									:href="'https://' + companyInfo.websiteLink"
									>{{ companyInfo.websiteLink }}</a
								>
							</h4>
						</div>

						<ul class="flex gap-4">
							<li>
								<a
									:href="companyInfo.social.facebook"
									class="hover:text-blue-600 transition-all text-[1.3rem] text-gray-800">
									<i class="fab fa-facebook"></i>
								</a>
							</li>
							<li>
								<a
									:href="companyInfo.social.instagram"
									class="hover:text-red-600 transition-all text-[1.3rem] text-gray-800">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							<li>
								<a
									:href="companyInfo.social.linkedin"
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
					title: '',
					description:
						'A new job circular has been published by The Jamuna Group for the position of' +
						'this.jobheading.jobtitle ' +
						'. Visit this link to sse the circular.',
					hashtags: 'JamunaGroup, Job, Circular, Bangladesh',
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
				jobheading: {},
				jobdescription: {},
				jobInfo: {},
				companyInfo: {
					social: {
						facebook: '',
						instagram: '',
						linkedin: '',
					},
				},
			};
		},
		mounted() {
			axios
				.get(
					window.location.origin +
						'/frontpage-api/circular-details/' +
						this.$route.params.id
				)
				.then((response) => {
					this.jobheading = response.data.jobheading;
					this.jobdescription = response.data.jobdescription;
					this.jobInfo = response.data.jobInfo;
					this.companyInfo = response.data.companyInfo;
					this.companyInfo.social = response.data.companyInfo.social;
				})
				.catch(()=>{
					this.$router.push({ name: "not-found" })
				})
		},
		setup() {
			const isDistrict = ref(true);
			const isSubdistrict = ref(true);
			const isActiveModal = ref(false);
			const districts = ref([]);
			const subdistricts = ref([]);

			const name = ref('');
			const age = ref('');
			const gender = ref('Gender');
			const division = ref('Division');
			const district = ref('District');
			const subdistrict = ref('Thana');
			const qualification = ref('Educational Qualification');
			const experience = ref('Experience (Years)');
			const university = ref('');
			const salary = ref('');
			const pdf = ref();
			const mobile = ref('');
			const email = ref('');
			const sCountry = ref('');
			const pCompany = ref('');

			const job_id = ref('');
			const _token = ref('');
			const company = ref('');

			const toggleModal = () => {
				isActiveModal.value = !isActiveModal.value;
				if (isActiveModal.value)
					document.body.style.overflowY = 'hidden';
				else document.body.style.overflowY = 'scroll';
			};
			const selectDivision = () => {
				districts.value = Object.keys(address[division.value]);
				district.value = 'District';
				subdistrict.value = 'Thana';
				isDistrict.value = false;
				if (division.value === 'Division') {
					subdistricts.value = ['Thana'];
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
					subdistricts.value = ['Thana'];
					isSubdistrict.value = false;
					return;
				}
			};
			const submitResume = () => {
				if (
					!name.value ||
					division.value === 'Division' ||
					district.value === 'District' ||
					subdistrict.value === 'Thana' ||
					experience.value === 'Experience (Years)' ||
					qualification.value === 'Educational Qualification' ||
					!pdf.value ||
					!mobile.value ||
					!email.value ||
					!age.value ||
					gender.value === 'Gender'
				) {
					return;
				} else {
					const userData = {
						new:{
						name: name.value,
						age: age.value,
						gender: gender.value,
						email: email.value,
						phone: mobile.value,
						division: division.value,
						district: district.value,
						subdistrict: subdistrict.value,
						experience: experience.value,
						salary: salary.value,
						'file-upload': pdf.value,
						qualification: qualification.value,
						university: university.value,
						job_id : job_id.value,
			_token : _token.value,
			company : company.value
					}
					}
					axios
					.post(window.location.origin + '/codebumble/from-receive', userData)
						.then((response) => {
							console.log(response);
						})
						.catch( error =>{
							console.log(error);
						})
					}
			};
			const onFileChange = (e) => {
				let files = e.target.files || e.dataTransfer.files;
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
				age,
				gender,
				division,
				district,
				subdistrict,
				qualification,
				experience,
				university,
				salary,
				mobile,
				email,
				sCountry,
				pCompany
			};
		},
	};
</script>
<style lang="scss">
	.close {
		@apply absolute top-4 right-8 text-3xl font-bold cursor-pointer text-gray-500;
	}
	.upper-part .share {
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
