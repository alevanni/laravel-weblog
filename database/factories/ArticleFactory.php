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
        $url = "https://picsum.photos/1200/350?random=".mt_rand(1, 55000);
        $contents = file_get_contents($url);
        $name = substr($url, strrpos($url, '/') + 1);
        Storage::disk('local')->put(('public/images/').$name, $contents);
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(7),
            'premium' => $this->faker->boolean(50),
            'user_id'=>User::inRandomOrder()->first()->id,
            'image' => $name
        ];
    }
}
