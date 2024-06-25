<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTechnologySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $techs = Technology::all();

        foreach ($posts as $post) {
            $post->technologies()->attach(
                $techs->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
