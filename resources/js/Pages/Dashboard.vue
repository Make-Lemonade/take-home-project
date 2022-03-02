<template>
	<app-layout>
		<template #heading>

			<h1 class="text-2xl text-gray-900">Orders</h1>

		</template>

		<template #main>

			<order-list :orders="orders" :total="total" :sort="sort"></order-list>

		</template>
	</app-layout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";
import OrderList from "./Orders/List";

export default {
	components: {OrderList, AppLayout},
	props: {
		'orders': Object,
		'total': Number,
		'sort': String
	}
}
</script>
