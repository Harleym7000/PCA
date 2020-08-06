<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::truncate();
        News::create([
            'title' => 'Test News Story',
            'story' => 'This is a test news story',
            'image' => 'pcaLogo.png'
            ]);
    }
}
