<template>
	<transition name="modal-animation">
		<div
			class="modal"
			v-show="isActiveModal">
			<transition name="modal-animation-inner">
				<div
					class="modal-inner"
					v-show="isActiveModal">
					<!-- Modal Content -->
					<slot />
				</div>
			</transition>
		</div>
	</transition>
</template>
<script>
	export default {
		props: ['isActiveModal'],
		setup(props, { emit }) {
			const close = () => {
				emit('close');
			};
			return {
				close,
			};
		},
	};
</script>
<style
	lang="scss"
	scoped>
	.modal-animation-enter-active,
	.modal-animation-leave-active {
		transition: opacity 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02);
	}
	.modal-animation-enter-from,
	.modal-animation-leave-to {
		opacity: 0;
	}
	.modal-animation-inner-enter-active {
		transition: all 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02) 0.15s;
	}
	.modal-animation-inner-leave-active {
		transition: all 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02);
	}
	.modal-animation-inner-enter-from {
		opacity: 0;
		transform: scale(0.8);
	}
	.modal-animation-inner-leave-to {
		transform: scale(0.8);
	}
	.modal {
		@apply bg-white flex justify-center items-center h-screen w-screen fixed top-0 left-0 bg-opacity-80;
	}
</style>
