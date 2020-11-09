<?php

use App\Section;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setion=new Section();
        $setion->name='Amir';
        $setion->status=55;
        $setion->save();
    }
}
