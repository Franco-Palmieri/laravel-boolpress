<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++){
            
            //creo il post
            
            $postObject = new Post();
            $postObject->name = $faker->word();
            $postObject->body = $faker->paragraph();
            $postObject->image = $faker->imageUrl(640, 480, 'post', true);
            $postObject->save();
        }
    }
}
