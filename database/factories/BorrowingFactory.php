<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrowing>
 */
class BorrowingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_date' => $this->faker->dateTimeBetween('-1 months', '+1 months'),
            'end_date' => $this->faker->dateTimeBetween('+1 months', '+2 months'),
            'id_book' => Book::factory(),
            'id_borrower' => User::factory(),
            'id_admin' => User::factory(),
        ];
    }
}
