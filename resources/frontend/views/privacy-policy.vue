<template>
	<privacyPolicy :contents="contents" />
</template>

<script>
	import privacyPolicy from '../components/footer/privacy-policy.vue';

	export default {
		components: {
			privacyPolicy,
		},
		data() {
			return {
				contents: {
					title: 'Privacy Policy',
					time: '2022-09-02',
					content:
						'<h2>Acceptance<\/h2><p>You may only access or use the Sites or Services, as defined herein if you agree to be bound by these Terms of Service ("TOS"). By accessing or using the Sites or Services, you imply that your assent to these TOUs. If you do not agree to be restrained by these TOS, do not access or use the Services.<\/P><h2>Coverage of these TOS<\/h2><p>Codebumble, Inc. ("Codebumble") reserves the right to update these TOS at any time without notice to you. These TOS apply to the above-listed websites of Codebumble, successor domain names that Codebumble may make available from time to time, and the online services contained or hosted on those Codebumble websites (collectively known as the "Sites or Services"). To the extent that certain areas of the Sites or Services require registration and\/or may be subject to additional terms and conditions of use, Codebumble will provide you with notice of those additional terms and conditions on registration. These TOS do not apply to your use of unaffiliated sites to which any of the Codebumble Sites merely link.<\/p><h2>Fair Use Policy<\/h2><p>The objective of Codebumble is to provide high-quality services to the customers. Codebumble reserves the right, in  Codebumble\\\'s only and exclusive preference, to remove any content for any reason, including but not limited to reasons listed in this Fair Use Policy. The Fair Use Policy below defines the actions relating to the content provided through the Sites which Codebumble considers to be inappropriate and thus prohibited. The examples named in this list are in addition to the types of content recognized in any other applicable agreement, are non-exclusive, and are provided exclusively for your guidance. If you are unsure whether any considered use or action is permitted, please send an email in advance to info@codebumble.net and, Codebumble will assist you.<\/p><h2>Intellectual Property Rights<\/h2><p>Codebumble and\/or its suppliers have all rights, title, and interest in and to the Sites and Services, including all copyrights, patents, trade secrets, trademarks, and other intellectual property rights. Codebumble reserves all rights not expressly granted. These TOS do not grant or imply any rights to any Codebumble or supplier trademarks, trade names, or logos. Codebumble only grants permission to a third party to use Codebumble-owned trademarks and\/or logos according to the conditions and specifications listed on the Codebumble Trademark Notice and Policy.<\/p><h2>Privacy<\/h2><p>Please read Codebumble\\\'s Privacy Policy for information about Codebumble\\\'s collection and use of your personal information. The Sites or Services may be managed by their privacy policies or statements, as referenced in the applicable agreements and account activation procedures specific to the Sites or Services.<\/p>',
				},
			};
		},
		setup() {},
		methods: {},
		created() {},
		mounted() {},
	};
</script>
