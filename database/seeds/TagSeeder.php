<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['FrontEnd Dev','BackEnd Dev','MVC','Models','Seeders'];

       foreach ($tags as $tag) {
          $new_tag = new Tag();
          $new_tag->name = $tag;
          $new_tag->slug = Str::slug($tag,'_');
          $new_tag->save();
       }
    }
}
