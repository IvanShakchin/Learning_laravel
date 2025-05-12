<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //тут подключаем фабрику. создаем 10 записей и сохраняем их в бд
        Post::factory()->count(10)->create();

    }
}
