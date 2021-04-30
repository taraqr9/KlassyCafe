<?php

namespace Database\Factories;

use App\Models\Reservation;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => '1',
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'guest_number' => $this->faker->numerify('#'),
            'reservation_date'=>$this->faker->date(),
            'reservation_time'=>$this->faker->time(),
            'message' =>$this->faker->text,
        ];
    }
}
