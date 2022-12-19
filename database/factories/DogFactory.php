<?php

namespace Database\Factories;

use App\Models\Dog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\dogs>
 */
class DogFactory extends Factory
{
    
    protected $model = Dog::class;

    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'url_foto'=>$this->faker->url,
            'description'=>$this->faker->text
        ];
    }
}
