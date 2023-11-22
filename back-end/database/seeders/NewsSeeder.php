<?php

namespace Database\Seeders;
use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            "title" => "Contoh Artikel Pertama",
            "slug" => "contoh-artikel-pertama",
            "content" => "lorem ipsum untuk artikel pertama",
            "thumbnail" => "default.png"
        ]);
        News::create([
            "title" => "Contoh Artikel ke dua",
            "slug" => "contoh-artikel-ke-dua",
            "content" => "lorem ipsum untuk artikel ke dua",
            "thumbnail" => "default.png"
        ]);
        News::create([
            "title" => "Contoh Artikel ke tiga",
            "slug" => "contoh-artikel-ke-tiga",
            "content" => "lorem ipsum untuk artikel ke tiga",
            "thumbnail" => "default.png"
        ]);
    }
}
