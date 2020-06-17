<?php

use Illuminate\Database\Seeder;
use App\Video;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::truncate();

        \DB::table('videos')->insert(array (
            0 => 
            array (
                'title'          => '李察朱威爾事件',
                'title_en'       => 'Richard Jewell',
                'description'    => '本片改編自1997年刊登於《Vanity Fair》雜誌上的一篇文章《美國惡夢》，真實事件改編。描述當不實的報導被當作事實時，真相會如何被遮掩的故事，一名英雄卻成了頭號嫌犯。',
                'description_en' => 'American security guard Richard Jewell saves many lives from an exploding bomb at the 1996 Olympics, but is vilified by journalists and the press who falsely reported that he was a terrorist.',
                'poster_url'     => 'https://r3sub.com/posters/3513548.jpg',
                'imdb_id'        => 'tt3513548',
                'atmovies_id'    => 'fben53513548',
                'douban_id'      => '25842038',
            ),
            1 => 
            array (
                'title'          => '極地守護犬',
                'title_en'       => 'The Call of the Wild',
                'description'    => '根據美國經典文學傑克倫敦的同名小說改編的真人電影。哈里遜福特與真狗CG動畫搭配演出，一人一犬踏上荒蕪的冒險之旅，前往世界的盡頭，大聲回應野性的呼喚。',
                'description_en' => 'A sled dog struggles for survival in the wilds of the Yukon.',
                'poster_url'     => 'https://r3sub.com/posters/7504726.jpg',
                'imdb_id'        => 'tt7504726',
                'atmovies_id'    => 'fcen47504726',
                'douban_id'      => '27199324',
            ),
            2 => 
            array (
                'title'          => '天氣之子',
                'title_en'       => 'Weathering With You',
                'description'    => '新海誠作品，本片是以「世界氣候異常」為主題，被命運捉弄的少年和少女的愛情故事，描述能以祈禱操控天氣的不可思議美少女天野陽菜與少年森島高帆。',
                'description_en' => 'A high-school boy who has run away to Tokyo befriends a girl who appears to be able to manipulate the weather.',
                'poster_url'     => 'https://r3sub.com/posters/9426210.jpg',
                'imdb_id'        => 'tt9426210',
                'atmovies_id'    => 'fwjp49426210',
                'douban_id'      => '30402296',
            ),
        ));
    }
}
