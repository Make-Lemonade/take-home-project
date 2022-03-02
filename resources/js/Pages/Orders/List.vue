<template>
	<div>
		<div class="text-sm">
			<header class="block border-t border-b border-neutral-100">
				<div class="grid grid-cols-12 gap-4 text-gray-400">
					<inertia-link href="/?sort=public_id" class="flex inline-flex items-center py-2 pr-1" :class="{'text-gray-800': sort == 'public_id'}">#
						<svg v-if="sort == 'public_id'" viewBox="0 0 24 24" fill="none"
						     xmlns="http://www.w3.org/2000/svg"
						     class="w-5 h-5 stroke-current fill-transparent ">
							<path d="m7.75 9.75 4.25 4.5 4.25-4.5" stroke="#25252D"
							      stroke-width="1.5" stroke-linecap="round"
							      stroke-linejoin="round"></path>
						</svg></inertia-link>
					<inertia-link href="/?sort=updated" class="flex inline-flex items-center col-span-2 px-1 py-2" :class="{'text-gray-800': sort == 'updated'}">Date
						<svg v-if="sort == 'updated'" viewBox="0 0 24 24" fill="none"
						     xmlns="http://www.w3.org/2000/svg"
						     class="w-5 h-5 stroke-current fill-transparent ">
							<path d="m7.75 9.75 4.25 4.5 4.25-4.5" stroke="#25252D"
							      stroke-width="1.5" stroke-linecap="round"
							      stroke-linejoin="round"></path>
						</svg></inertia-link>
					<inertia-link href="/?sort=status" class="flex inline-flex items-center col-span-2 px-2 py-2" :class="{'text-gray-800': sort == 'status'}">Status
						<svg v-if="sort == 'status'" viewBox="0 0 24 24" fill="none"
						     xmlns="http://www.w3.org/2000/svg"
						     class="w-5 h-5 stroke-current fill-transparent ">
							<path d="m7.75 9.75 4.25 4.5 4.25-4.5" stroke="#25252D"
							      stroke-width="1.5" stroke-linecap="round"
							      stroke-linejoin="round"></path>
						</svg></inertia-link>
					<span class="col-span-2 px-1 py-2" :class="{'text-gray-800': sort == 'customer'}">Customer</span>
					<span class="col-span-3 px-1 py-2">Purchased</span>
					<inertia-link href="/?sort=revenue" class="flex inline-flex items-center px-1 py-2" :class="{'text-gray-800': sort == 'revenue'}">Revenue
						<svg v-if="sort == 'revenue'" viewBox="0 0 24 24" fill="none"
						     xmlns="http://www.w3.org/2000/svg"
						     class="w-5 h-5 stroke-current fill-transparent ">
							<path d="m7.75 9.75 4.25 4.5 4.25-4.5" stroke="#25252D"
							      stroke-width="1.5" stroke-linecap="round"
							      stroke-linejoin="round"></path>
						</svg></inertia-link>
					<span class="pl-4"></span>
				</div>
			</header>
			<div class="block">
				<ul class="divide-y divide-neutral-100">
					<li v-for="order in orders.data"
					    :key="order.id" class="grid grid-cols-12 gap-4">
						<div class="flex inline-flex items-center px-1 py-2">#{{ order.public_id }}</div>
						<div class="flex inline-flex items-center col-span-2 px-1 py-2">{{ formatDate(order.updated) }}</div>
						<div class="flex inline-flex items-center col-span-2 px-2 py-2">
							<template
							          v-if="order.status === 'complete'">
								<svg class="mr-1 text-green-400" width="24" height="24"
								     fill="none"
								     viewBox="0 0 24 24">
									<path stroke="currentColor"
									      stroke-linecap="round"
									      stroke-linejoin="round" stroke-width="1.5"
									      d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z"></path>
									<path stroke="currentColor"
									      stroke-linecap="round"
									      stroke-linejoin="round" stroke-width="1.5"
									      d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75"></path>
								</svg>
								<span>Paid</span>
							</template>
							<template v-else-if="order.status === 'chargeback'">
								<svg class="mr-1 text-red-400" width="24" height="24"
								     fill="none"
								     viewBox="0 0 24 24">
									<path stroke="currentColor"
									      stroke-linecap="round"
									      stroke-linejoin="round" stroke-width="1.5"
									      d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z"></path>
									<path stroke="currentColor"
									      stroke-linecap="round"
									      stroke-linejoin="round" stroke-width="1.5"
									      d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75"></path>
								</svg>
								<span>Chargeback</span>
							</template>
							<template v-else-if="order.status === 'refunded'">
								<svg class="mr-1 text-gray-400" width="24" height="24"
								     fill="none"
								     viewBox="0 0 24 24">
									<path stroke="currentColor"
									      stroke-linecap="round"
									      stroke-linejoin="round" stroke-width="1.5"
									      d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z"></path>
									<path stroke="currentColor"
									      stroke-linecap="round"
									      stroke-linejoin="round" stroke-width="1.5"
									      d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75"></path>
								</svg>
								<span>Refunded</span>
							</template>
							<template v-else>
								<svg class="mr-1 text-orange-400" width="24" height="24"
								     fill="none"
								     viewBox="0 0 24 24">
									<path stroke="currentColor"
									      stroke-linecap="round"
									      stroke-linejoin="round" stroke-width="1.5"
									      d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z"></path>
									<path stroke="currentColor"
									      stroke-linecap="round"
									      stroke-linejoin="round" stroke-width="1.5"
									      d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75"></path>
								</svg>
								<span>Voided</span>
							</template>
						</div>
						<div class="col-span-2 px-1 py-2">
							<div class="flex items-center">
								<img class="inline-block h-8 w-8 rounded-full mr-2"
								     :src="order.customer_avatar"
								     :alt="order.customer_name + ' Avatar'">
								<span>{{ order.customer_name }}</span>
							</div>
						</div>
						<div class="col-span-3 px-1 py-2">
							<div class="flex items-center">
								<img class="inline-block h-8 w-8 mr-2"
								     src="https://source.unsplash.com/random/200x200"
								     alt="Random Product Image">
								<ul>
									<li v-for="item in JSON.parse(order.items).slice(0, 1)">
										{{ item }}
										<span class="text-gray-400"
										      v-if="JSON.parse(order.items).length > 1">+ {{
												JSON.parse(order.items).length - 1
											}} more</span>
									</li>
								</ul>
							</div>
						</div>
						<div class="flex inline-flex items-center px-1 py-2">{{ formatPrice(order.revenue) }}</div>
						<div class="text-right px-3 py-2">...</div>
					</li>
				</ul>
			</div>

			<pagination :prev="orders.prev_page_url" :next="orders.next_page_url" :total="total"/>
		</div>
	</div>
</template>

<script>
import Pagination from "./Pagination";

export default {
	name: "OrderList",
	components: {Pagination},
	props: ['orders', 'total', 'sort'],
	methods: {
		// should be global but this will suffice for KISS
		formatPrice(price) {
			if (typeof price !== "number") {
				return price;
			}
			var formatter = new Intl.NumberFormat('en-US', {
				style: 'currency',
				currency: 'USD',
				minimumFractionDigits: 2
			});
			return formatter.format(price / 100);
		},
		formatDate(dateString) {
			const date = new Date(dateString);
			// Then specify how you want your dates to be formatted
			return new Intl.DateTimeFormat('default', {dateStyle: 'long'}).format(date);
		}
	}

}
</script>