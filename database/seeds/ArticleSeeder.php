<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Article;
use App\User;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {

            $newArticle = new Article;
            $user = User::inRandomOrder()->first();

            $newArticle->user_id = $user->id;
            $newArticle->title = $faker->sentence(5, true);
            $newArticle->content = $faker->text(255);
            $newArticle->slug = Str::of($newArticle->title)->slug("-");

            $newArticle->save();
        }
    }
}
