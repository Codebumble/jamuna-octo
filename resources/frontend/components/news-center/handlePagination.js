import { ref, computed } from "vue";

export default function handlePagination() {
	let page = ref(1);

	const myUsers = [
		{ name: "shark", likes: "ocean" },
		{ name: "turtle", likes: "pond" },
		{ name: "otter", likes: "fish biscuits" },
		{ name: "otter", likes: "fish biscuits" },
		{ name: "shark", likes: "ocean" },
		{ name: "turtle", likes: "pond" },
		{ name: "otter", likes: "fish biscuits" },
		{ name: "shark", likes: "ocean" },
		{ name: "turtle", likes: "pond" },
		{ name: "otter", likes: "fish biscuits" },
		{ name: "shark", likes: "ocean" },
		{ name: "turtle", likes: "pond" },
		{ name: "otter", likes: "fish biscuits" },
	];

	const data = myUsers.map((item) => {
		return item;
	});

	const perPage = 10;

	const paginatedData = computed(() =>
		data.slice((page.value - 1) * perPage, page.value * perPage)
	);

	const nextPage = () => {
		if (page.value !== Math.ceil(data.length / perPage)) {
			page.value += 1;
		}
	};

	const backPage = () => {
		if (page.value !== 1) {
			page.value -= 1;
		}
	};

	const goToPage = (numPage) => {
		page.value = numPage;
	};

	return { data, paginatedData, perPage, page, nextPage, backPage, goToPage };
}
