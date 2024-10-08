<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;



class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        $articles = Article::factory()->count(15)->create();

        $articles->each(function ($article) use ($categories) {
            $article->categories()->attach(
                $categories->random(rand(0, 3))->pluck('id')->toArray()
            );
        });
    }
}
