<template>
	<div>
		<div class="border-t border-t border-neutral-100 flex justify-between py-8">
			<div>
				{{ total }} results
			</div>
			<div>
				<inertia-link
				    class="px-2"
				    :class="{ 'text-gray-200': prev == null }"
				    :href="prev">
					Prev
				</inertia-link>
				<inertia-link
				    class="px-2"
				    :class="{ 'text-gray-200': next === null }"
				    :href="next">
					Next
				</inertia-link>
			</div>
		</div>
	</div>
</template>
<script>
export default {
	name: 'Pagination',
	props: {
		total: Number,
		prev: String,
		next: String,
	},
}
</script>
