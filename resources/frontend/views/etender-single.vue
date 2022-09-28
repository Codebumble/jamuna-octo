<template>
	<section class="py-20">
		<div class="container">
			<div class="upper-part">
				<div class="pt-20 text-center">
					<h2
						class="
							font-bold
							text-gray-800 text-3xl
							leading-snug
							pb-1
						">
						{{ tender.title }}
					</h2>
					<p class="mb-4">
						by
						<span class="font-bold">{{ tender.comp_name }}</span>
						in {{ tender.location }}
					</p>
					<button
						class="
							font-bold
							rounded-full
							px-4
							py-2
							bg-red-600
							text-white
							hover:bg-white hover:text-red-600
							border border-red-600
							inline-block
						"
						@click="toggleModal">
						Apply Now
					</button>
					<Modal :isActiveModal="isActiveModal" @close="toggleModal">
						<div class="apply relative pt-4">
							<span class="close" @click="toggleModal"
								>&times;</span
							>
							<form
								class="pt-6"
								@submit.prevent="submit"
								enctype="multipart/form-data">
								<div
									class="
										grid grid-cols-1
										md:grid-cols-2
										gap-x-0
										md:gap-x-4
									">
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="new[company_name]"
												id="companyName"
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
												placeholder="Name of Company"
												v-model="companyName" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="new[contact_person]"
												id="contactPerson"
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
												placeholder="Contact Person"
												v-model="contactPerson" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="number"
												name="new[contact_no]"
												id="contactNo"
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
												placeholder="Contact No"
												v-model="contactNo" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="email"
												name="new[email]"
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
												placeholder="Email"
												v-model="email" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="new[designation]"
												id="designation"
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
												placeholder="Designation"
												v-model="designation" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="new[department]"
												id="department"
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
												placeholder="Department"
												v-model="department" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="new[country]"
												id="country"
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
												placeholder="Country"
												v-model="country" />
										</div>
									</div>
									<div class="input-group">
										<div class="input-item">
											<input
												type="text"
												name="new[currency]"
												id="currency"
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
												placeholder="Currency"
												v-model="currency" />
										</div>
									</div>
								</div>
								<div class="input-group">
									<div class="input-item">
										<textarea
											type="text"
											name="new[address]"
											id="address"
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
											placeholder="Address"
											v-model="address" />
									</div>
								</div>
								<div class="input-group">
									<div class="input-item">
										<div>
											<div
												class="
													mt-1
													flex
													justify-center
													px-4
													pt-3
													pb-4
													border-2
													border-gray-300
													border-dashed
													rounded-md
												">
												<div
													class="
														space-y-1
														text-center
													">
													<svg
														xmlns="http://www.w3.org/2000/svg"
														class="
															mx-auto
															h-8
															w-8
															text-gray-400
														"
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
														class="
															flex
															text-sm
															text-gray-600
														">
														<label
															for="file-upload"
															class="
																relative
																cursor-pointer
																bg-white
																rounded-md
																font-medium
																text-red-500
																hover:text-red-500
																focus-within:outline-none
																focus-within:ring-2
																focus-within:ring-offset-2
																focus-within:ring-red-500
																border-[1px]
																border-gray-300
															"
															id="companyProfile">
															<span
																>Upload
																File</span
															>
															<input
																id="file-upload"
																name="new[file_upload]"
																type="file"
																class="sr-only"
																accept="application/pdf"
																@change="
																	previewFiles
																" />
														</label>
														<p class="pl-1">
															or drag and drop
															your File
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<button
									type="submit"
									class="
										inline-flex
										justify-center
										pt-2
										px-4
										border border-transparent
										hover:border-red-600
										shadow-sm
										text-sm
										rounded-full
										text-white
										hover:text-red-600
										bg-red-600
										hover:bg-white
										transition-all
										w-full
										h-12
										items-center
										font-bold
									">
									Send
								</button>
							</form>
						</div>
					</Modal>
					<div class="pt-4">
						<span class="time">{{bdTime > new Date(tender.last_date).getTime()  ? 'Expired': "Active"}}</span>
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
							<td>{{ tender.comp_name }}</td>
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
											:href="corr.src"
											class="
												underline
												decoration-dotted
												hover:decoration-red-400
												decoration-gray-400
											">
											{{ corr.label }}
										</a>
									</li>
								</ul>
							</td>
						</tr>
						<tr>
							<th>Procurement Method</th>
							<td>{{ tender.proc_method }}</td>
						</tr>
						<tr>
							<th>Name of work</th>
							<td>{{ tender.work_name }}</td>
						</tr>
						<tr>
							<th>Address</th>
							<td>{{ tender.address }}</td>
						</tr>
						<tr>
							<th>Tender Ref. No.</th>
							<td>{{ tender.ref_no }}</td>
						</tr>
						<tr>
							<th>Tender Publication Date</th>
							<td>{{ tender.publish_date }}</td>
						</tr>
						<tr>
							<th>Tender Last Selling Date</th>
							<td>{{ tender.last_date }}</td>
						</tr>
						<tr>
							<th>Tender Closing & Receiving Date and Time</th>
							<td>{{ tender.crdt }}</td>
						</tr>
						<tr>
							<th>Pre-Tender Meeting</th>
							<td>{{ tender.pre_t_meeting }}</td>
						</tr>
						<tr>
							<th>Tender Opening Date and Time</th>
							<td>{{ tender.t_open_date }}</td>
						</tr>
						<tr>
							<th>Location of Supply/Works</th>
							<td>{{ tender.supply_location }}</td>
						</tr>
						<tr>
							<th>Schedule Submission At</th>
							<td>{{ tender.schedule_submission }}</td>
						</tr>
						<tr>
							<th>Source of Fund</th>
							<td>{{ tender.fund_source }}</td>
						</tr>
						<tr>
							<th>Price of Schedule</th>
							<td>{{ tender.price_schedule }}</td>
						</tr>
						<tr>
							<th>Tender Security Amount</th>
							<td>{{ tender.security_amount }}</td>
						</tr>
						<tr>
							<th>Time Required for completion</th>
							<td>{{ tender.req_time }}</td>
						</tr>
					</table>
					<h4 class="font-bold text-lg text-gray-800 mb-4">
						Attachments:
					</h4>
					<ul class="list-disc list-inside text-gray-600">
						<li v-for="item in tender.package_details" :key="item">
							<a
								:href="item.src"
								class="
									underline
									decoration-dotted
									hover:decoration-solid
									decoration-slate-400
									hover:decoration-red-600
									underline-offset-4
									hover:text-red-600
									transition-all
								"
								>{{ item.label }}</a
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
import Modal from '../components/global/modal';
import { ref } from 'vue';
import { createToaster } from '@meforma/vue-toaster';
import { useRoute } from 'vue-router';

export default {
	components: {
		Modal,
	},
	setup() {
		const isActiveModal = ref(false);
		const route = useRoute();
		const toaster = createToaster({});

		const tender = ref({});
		const sharing = ref({
			url: window.location.origin + route.path,
			// title: this.data.tender.title,
			hashtags: 'JamunaGroup, Bangladesh',
		});
		const networks = ref([
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
		]);

		const companyName = ref('');
		const contactPerson = ref('');
		const contactNo = ref('');
		const email = ref('');
		const designation = ref('');
		const department = ref('');
		const country = ref('');
		const currency = ref('');
		const address = ref('');
		const companyProfile = ref();

		// Get BD Date
		const bdTime = ref('')
		axios
			.get('https://timezoneapi.io/api/timezone/?Asia/Dhaka&token=aUkFXecKNzRhIrDjxmxa')
			.then((response) => {
				bdTime.value = new Date(response.data.data.datetime.date).getTime()
			});

		// Get Data
		axios
			.get(
				window.location.origin +
					'/frontpage-api/view-tender/' +
					route.params.id
			)
			.then((response) => {
				tender.value = {
					...response.data,
					package_details: JSON.parse(response.data.package_details),
					corrigendum: JSON.parse(response.data.corrigendum),
				};
			})

		const previewFiles = (e) => {
			companyProfile.value = e.target.files[0];
		};

		const toggleModal = () => {
			isActiveModal.value = !isActiveModal.value;
			if (isActiveModal.value) document.body.style.overflowY = 'hidden';
			else document.body.style.overflowY = 'scroll';
		};

		const submit = () => {
			const addClass = (selector) => {
				document
					.getElementById(selector)
					.classList.add('border-red-500');
			};
			const removeClass = (selector) => {
				document
					.getElementById(selector)
					.classList.remove('border-red-500');
			};

			let formData = new FormData();
			formData.append('new[company]', tender.value.comp_name);
			formData.append('new[tender_name]', tender.value.title);
			formData.append('new[contact_person]', contactPerson.value);
			formData.append('new[contact_no]', contactNo.value);
			formData.append('new[email]', email.value);
			formData.append('new[designation]', designation.value);
			formData.append('new[department]', department.value);
			formData.append('new[country]', country.value);
			formData.append('new[currency]', currency.value);
			formData.append('new[address]', address.value);
			// formData.append('new[companyProfile]', companyProfile.value);
			formData.append('new[tender_id]', route.params.id);
			formData.append('_token', tender.value._token);

			formData.append(
				'new[file_upload]',
				document.querySelector('#file-upload').files[0]
			);

			if (
				!companyName.value ||
				!contactPerson.value ||
				!contactNo.value ||
				!email.value ||
				!designation.value ||
				!department.value ||
				!country.value ||
				!currency.value ||
				!address.value ||
				!companyProfile.value ||
				companyProfile.value.type !== 'application/pdf'
			) {
				if (!companyName.value) {
					addClass('companyName');
				} else {
					removeClass('companyName');
				}
				if (!contactPerson.value) {
					addClass('contactPerson');
				} else {
					removeClass('contactPerson');
				}
				if (!contactNo.value) {
					addClass('contactNo');
				} else {
					removeClass('contactNo');
				}
				if (!email.value) {
					addClass('email');
				} else {
					removeClass('email');
				}
				if (!designation.value) {
					addClass('designation');
				} else {
					removeClass('designation');
				}
				if (!department.value) {
					addClass('department');
				} else {
					removeClass('department');
				}
				if (!country.value) {
					addClass('country');
				} else {
					removeClass('country');
				}
				if (!currency.value) {
					addClass('currency');
				} else {
					removeClass('currency');
				}
				if (!address.value) {
					addClass('address');
				} else {
					removeClass('address');
				}
				if (!companyProfile.value) {
					addClass('companyProfile');
				} else {
					removeClass('companyProfile');
				}
			} else {
				let xhr = new XMLHttpRequest();
				xhr.open(
					'POST',
					window.location.origin + '/codebumble/tender_from-receive',
					true
				);
				xhr.onload = function () {
					if (JSON.parse(this.response).data > 0) {
						companyName.value = '';
						contactPerson.value = '';
						contactNo.value = '';
						email.value = '';
						designation.value = '';
						department.value = '';
						country.value = '';
						currency.value = '';
						address.value = '';
						companyProfile.value = undefined;

						removeClass('companyName');
						removeClass('contactPerson');
						removeClass('contactNo');
						removeClass('email');
						removeClass('designation');
						removeClass('department');
						removeClass('country');
						removeClass('currency');
						removeClass('address');
						removeClass('companyProfile');

						toggleModal();
						toaster.success('Form submit successfully');
						return;
					} else {
						toaster.error(JSON.parse(this.response).error);
					}
				};
				xhr.send(formData);
			}
		};

		return {
			bdTime,
			tender,
			sharing,
			networks,
			isActiveModal,
			previewFiles,
			toggleModal,
			companyName,
			contactPerson,
			contactNo,
			email,
			designation,
			department,
			country,
			currency,
			address,
			companyProfile,
			submit,
		};
	},
};
</script>
