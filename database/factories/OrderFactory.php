<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,10),
            'public_id' => rand(42,1000),  // Keeping it simple since the displayed order id shouldn't be the db id
            'updated' => Carbon::today()->subDays(rand(0, 365)),
            'status' => $this->randStatus(),
            'customer_avatar' => 'https://source.unsplash.com/random/400x400?' . urlencode($this->faker->name()),
            'customer_name' => $this->faker->name(),
            'items' => json_encode($this->randProducts()),
            'currency' => 'usd',
            'revenue' => rand(1324,127634)

        ];
    }

    private function randStatus()
    {
        // 75% chance of having a status of complete
        // elegant? nah, especially with two returns ... KISS
        if (rand(0,4) < 4) {
            return 'complete';
        }
        // the 25% chance for something else.
        $statuses = ['chargeback', 'refunded', 'voided' ];
        return $statuses[array_rand($statuses)];
    }

    private function randProducts()
    {
        $products = ['Wireframing Kit for Figma', 'Mastering the Grid', 'Splashify 2.0' ];
        if (rand(0,10) < 1) { // ~9% chance to return all products
            return $products;
        }
        return [$products[array_rand($products)]];
    }
}
