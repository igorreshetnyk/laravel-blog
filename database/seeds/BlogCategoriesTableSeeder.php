<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cName = 'No category';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 0,
            'description' => '',
        ];

        for ($i = 1; $i < 10; $i++) {
            $cName = 'Category #' . $i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
                'title' => $cName,
                'slug' => Str::slug($cName),
                'parent_id' => $parentId,
                'description' => '',
            ];
        }

        \DB::table('blog_categories')->insert($categories);
    }
}
