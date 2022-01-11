<?php

namespace Database\Factories;

use Dotenv\Util\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->text('30');
        return [ 'title'=>$name,
            'slug'=>\Illuminate\Support\Str::slug($name),
            'photo'=>$this->faker->name,

            //
        ];
    }
}
