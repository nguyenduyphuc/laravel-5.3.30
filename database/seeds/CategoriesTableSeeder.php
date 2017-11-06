<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 5)->create();
        $category = \App\Category::all();
        foreach ($category as $p) {
            $p->addMediaFromUrl("https://image.ibb.co/ktsMWQ/adv3.jpg")->toMediaLibrary('image');
        }

    }
}
