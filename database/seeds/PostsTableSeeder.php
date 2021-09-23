<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
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
        $categoryList = [
            'personale',
            'attualità',
            'tematico',
            'politico',
            'directory'
        ];
        $listOfCategoryID = [];

        foreach($categoryList as $category) {
            $categoryObject = new Category();
            $categoryObject->name = $category;
            $categoryObject->save();
            $listOfCategoryID[] = $categoryObject->id; //pusho id dei categoryObject
        }

        for ($i = 0; $i < 50; $i++){
            
            //creo il post
            
            $postObject = new Post();
            $postObject->name = $faker->word();
            $postObject->body = $faker->paragraph();
            $postObject->image = $faker->imageUrl(640, 480, 'post', true);

            //popolo tabella Categories
            $randCategoryKey = array_rand($listOfCategoryID, 1);
            $categoryID = $listOfCategoryID[$randCategoryKey];
            $postObject->category_id = $categoryID;

            $postObject->save();
        }
    }
}
