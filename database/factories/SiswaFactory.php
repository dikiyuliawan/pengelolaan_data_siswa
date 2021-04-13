<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_depan' => $this->faker->firstName,
            'nama_belakang' => $this->faker->lastName,
            'jenis_kelamin' => $this->faker->randomElement(['L', "P"]),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
            'alamat' => $this->faker->address,
            'user_id' => '100',
        ];
    }
}
