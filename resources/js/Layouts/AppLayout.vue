<template>

	<div class="min-h-screen bg-neutral-50">

		<!-- Sidebar -->
		<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
			<navigation :current="current"/>
		</div>

		<!-- Main Content -->
		<div class="md:pl-64 flex flex-col flex-1 bg-white">
			<main class="flex-1">
				<div class="py-8">

					<div class="max-w-7xl mx-auto p-4 sm:p-6 md:p-8">
						<slot name="heading"></slot>
					</div>

					<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
						<slot name="main"></slot>
					</div>

				</div>
			</main>
		</div>


	</div>

</template>

<script>


import Navigation from './Navigation.vue';

export default {
	components: {Navigation},
	props: ['current'],
}
</script>
