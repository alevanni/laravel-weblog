<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $url = "https://www.google.co.in/intl/en_com/images/srpr/logo1w.png";
        $contents = file_get_contents($url);
        $name = substr($url, strrpos($url, '/') + 1);
        Storage::disk('local')->put(('public/images/').$name, $contents);
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(70),
            'premium' => $this->faker->boolean(50),
            'user_id'=>User::inRandomOrder()->first()->id,
            'image' => $name
        ];
    }
}
