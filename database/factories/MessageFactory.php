<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->date('Y-m-d', 'now');
        return [
            'name' => $this->faker->sentence(5),
            'email' => $this->faker->email,
            'description' => $this->faker->text,
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
