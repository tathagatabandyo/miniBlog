<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,40) as $value) {
            $post = new Post();
            $post->title=$faker->jobTitle();
            $post->body=$faker->randomLetter();
            $post->user_id=2;
            $post->save();
        }
    }
}
