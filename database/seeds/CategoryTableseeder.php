<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorydata=[
            ['parent_id'=>0,'section_id'=>1,'category_name'=>'T-Sherts','category_discount'=>0,
            'description'=>'','url'=>'','meta_title'=>'','meta_description'=>'','meta_keyword'=>'','status'=>1],
            ['parent_id'=>1,'section_id'=>1,'category_name'=>'Casual T-Sherts','category_discount'=>0,
            'description'=>'','url'=>'','meta_title'=>'','meta_description'=>'','meta_keyword'=>'','status'=>1]
        ];
        Category::insert($categorydata);
    }
}
