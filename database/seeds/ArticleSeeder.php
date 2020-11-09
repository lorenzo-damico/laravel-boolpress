<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Article;
use App\User;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) {

          $user = User::inRandomOrder()->first();

          $newArticle = new Article();

          $newArticle->user_id = $user->id;
          $newArticle->title = $faker->sentence(6, true);
          $newArticle->content = $faker->paragraph(6, true);
          $newArticle->slug = Str::of($newArticle->title)->slug('-');

          $newArticle->save();
        }
    }
}
