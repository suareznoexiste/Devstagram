<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //de esta manera se usa el  factory
        //sail artisan tinker
        //App\Models\Post::factory()->times(200)->create();
        return [
            'titulo'=>$this->faker->sentence(5),
            'descripcion'=>$this->faker->sentence(20),
            'imagen'=>$this->faker->uuid().'.jpg',
            'user_id'=>$this->faker->randomElement([4,2,3])
            //ESTO PRUEBA NUESTRA BASE DE DATOS 
            //LE INSERTA ELEMENTOS
            //FAKER ES UNA LIBRERIA DE ELEMENTOS FAKE
            //SENTENCE ES LA CANTIDAD DE CARACTARES
            //UUID ES UNIQUE ID
        ];
    }
}
