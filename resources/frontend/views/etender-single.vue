<template>
	<section class="py-20">
		<div class="container">
			<div class="upper-part">
				<div class="pt-20 text-center">
					<h2
						class="font-bold text-gray-800 text-3xl leading-snug pb-1">
						{{ tender.title }}
					</h2>
					<p class="mb-4">
						by
						<span class="font-bold">{{ tender.compName }}</span>
						in {{ tender.location }}
					</p>
					<button
						class="font-bold rounded-full px-4 py-2 bg-red-600 text-white hover:bg-white hover:text-red-600 border border-red-600 inline-block">
						Apply Now
					</button>
					<!-- <Modal
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
								@submit.prevent="submitResume"
								enctype="multipart/form-data">
								<div
									class="grid grid-cols-1 md:grid-cols-2 gap-x-0 md:gap-x-4">
									<div class="input-group">
										<div class="input-item">
											<input
												type="hidden"
												name="new[job_id]"
												:value="jobInfo.id"
												:v-model="job_id" />

											<input
												type="hidden"
												name="_token"
												:value="jobInfo.token"
												:v-model="_token" />

											<input
												type="hidden"
												name="new[company]"
												:value="companyInfo.name"
												:v-model="company" />

											<input
												type="text"
												name="new[name]"
												id="name"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Applicant Name"
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
													v-model="gender">
													<option>
														{{ gender }}
													</option>
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
													@change="selectDivision">
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
													v-model="district">
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
													v-model="subdistrict">
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
													v-model="qualification">
													<option>
														Educational
														Qualification
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
													v-model="experience">
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
												v-model="salary" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="new[phone]"
												id="phone"
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
												id="email"
												class="focus:ring-red-500 focus:border-red-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
												placeholder="Your Email"
												v-model="email" />
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
												v-model="sCountry" />
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
												v-model="pCompany" />
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
															class="relative cursor-pointer bg-white rounded-md font-medium text-red-500 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500 border-[1px] border-gray-300"
															id="pdf">
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
																	previewFiles
																" />
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
					</Modal> -->
					<div class="pt-4">
						<span class="time">{{ tender.status }}</span>
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
			<div class="w-full lg:w-10/12 mx-auto overview pt-20">
				<div class="w-full break-words overflow-hidden description">
					<h4 class="font-bold text-lg text-gray-800 mb-4">
						Package Details:
					</h4>
					<table>
						<tr>
							<th>Name of Company</th>
							<td>{{ tender.compName }}</td>
						</tr>
						<tr>
							<th>Corrigendum</th>
							<td>
								<ul>
									<li
										v-for="corr in tender.corrigendum"
										:key="corr"
										class="my-1">
										<a
											:href="corr.link"
											class="underline decoration-dotted hover:decoration-red-400 decoration-gray-400">
											{{ corr.label }}
										</a>
									</li>
								</ul>
							</td>
						</tr>
						<tr>
							<th>Procurement Method</th>
							<td>{{ tender.procMethod }}</td>
						</tr>
						<tr>
							<th>Name of work</th>
							<td>{{ tender.workName }}</td>
						</tr>
						<tr>
							<th>Address</th>
							<td>{{ tender.address }}</td>
						</tr>
						<tr>
							<th>Tender Ref. No.</th>
							<td>{{ tender.refNo }}</td>
						</tr>
						<tr>
							<th>Tender Publication Date</th>
							<td>{{ tender.publishTime }}</td>
						</tr>
						<tr>
							<th>Tender Last Selling Date</th>
							<td>{{ tender.lastTime }}</td>
						</tr>
						<tr>
							<th>Tender Closing & Receiving Date and Time</th>
							<td>{{ tender.crdt }}</td>
						</tr>
						<tr>
							<th>Pre-Tender Meeting</th>
							<td>{{ tender.preTenderM }}</td>
						</tr>
						<tr>
							<th>Tender Opening Date and Time</th>
							<td>{{ tender.tenderOpenDate }}</td>
						</tr>
						<tr>
							<th>Location of Supply/Works</th>
							<td>{{ tender.supplyLocation }}</td>
						</tr>
						<tr>
							<th>Schedule Submission At</th>
							<td>{{ tender.scheSubmit }}</td>
						</tr>
						<tr>
							<th>Source of Fund</th>
							<td>{{ tender.sof }}</td>
						</tr>
						<tr>
							<th>Price of Schedule</th>
							<td>{{ tender.pos }}</td>
						</tr>
						<tr>
							<th>Tender Security Amount</th>
							<td>{{ tender.tsa }}</td>
						</tr>
						<tr>
							<th>Time Required for completion</th>
							<td>{{ tender.trc }}</td>
						</tr>
					</table>
					<h4 class="font-bold text-lg text-gray-800 mb-4">
						Attachments:
					</h4>
					<ul class="list-disc list-inside text-gray-600">
						<li>
							<a
								:href="tender.attachment.link"
								class="underline decoration-dotted hover:decoration-solid decoration-slate-400 hover:decoration-red-600 underline-offset-4 hover:text-red-600 transition-all"
								>{{ tender.attachment.label }}</a
							>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
</template>

<style lang="scss">
	@import '../assets/scss/variables/_tender.scss';
	@import '../assets/scss/variables/apply';
</style>

<script>
	// import { useHead } from '@vueuse/head';
	import Modal from '../components/global/modal';
	import { createToaster } from '@meforma/vue-toaster';

	export default {
		components: {
			Modal,
		},
		data() {
			return {
				tender: {
					title: 'Interior Design & Decoration for Guest Areas',
					compName: 'Hoor',
					location: 'Dhaka, Bangladesh',
					status: 'Expired',

					procMethod:
						'Open Tendering Method (One stage, Two Envelopes)',
					corrigendum: [
						{
							link: '/',
							label: 'link 1',
						},
						{
							link: '/',
							label: 'link 1',
						},
					],
					workName: 'Façade Fabrication (Unitized)',
					address:
						'Jamuna Group, Pragati Sarani, Kuril, Baridhara, Dhaka-1229, Bangladesh',
					refNo: 'JBL/TENDER/2017/4609/1',
					publishTime: '2017-12-18',
					lastTime: '2018-02-04 04:00:00',
					crdt: '2018-02-05 02:30:00',
					preTenderM: '2018-01-14 10:00:00',
					tenderOpenDate: '2018-02-05 03:00:00',
					supplyLocation:
						'JW Marriott Hotel Dhaka, Pragati Sarani, Kuril, Baridhara, Dhaka-1229, Bangladesh',
					scheSubmit:
						'Managing Director, Jamuna Group, Jamuna Future Park (9th floor), Ka-244, Kuril, Baridhara, Dhaka-1229',
					sof: "Company's Own Source",
					pos: '10,000.00 BDT',
					tsa: '15,000,000.00 BDT / $187,500.00 USD',
					trc: '6 Months',
					attachment: {
						link: '/',
						label: 'download the package details',
					},
				},
				sharing: {
					url: window.location.origin + this.$route.path,
					// title: this.data.tender.title,
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
	};
</script>
