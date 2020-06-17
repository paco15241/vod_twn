<?php

use Illuminate\Database\Seeder;
use App\Platform;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platform::truncate();

        \DB::table('platforms')->insert(array (
            0 => 
            array (
                'video_id'       => 1,
                'platform_name'  => 'CatchPlay+',
                'title'          => '李察朱威爾事件',
                'description'    => '【美國狙擊手】金獎導演克林伊斯威特執導，改編自震撼人心的奧運爆炸案真實事件。戲精凱西貝茲雙料入圍奧斯卡與金球獎最佳女配角，【老娘叫譚雅】保羅沃爾特豪澤爾、【意外】奧斯卡最佳男配角山姆洛克威爾領銜主演。1996年亞特蘭大奧運會期間發生一起爆炸案，發現炸彈並報警的保安李察朱威爾竟意外在調查過程中從英雄變成囚徒；為了洗刷清白，他向獨立律師華森求助，一連串反體制的抗爭行動就此展開。',
                'page_url'       => 'https://www.catchplay.com/tw/video-407a6d16-be64-4c16-9cbb-0aba5bd7c137',
                'provider'       => 'warner bros digital distribution Home Enterta',
                'on_at'          => '2020-04-19 18:03:48',
                'off_at'         => '2021-04-20 18:03:48'
                
            ),
            1 => 
            array (
                'video_id'       => 2,
                'platform_name'  => 'friDay',
                'title'          => '極地守護犬',
                'description'    => '改編世界文學名著、20世紀百大小說《野性的呼喚》 靈犬巴克原本生活在充滿陽光的加州，沒想到卻意外被拐賣到寒冷偏遠、盛產黃金的北方阿拉斯加，巴克輾轉成為雪橇犬，流落在不同主人之間，在這淘金熱時期，等著它的不是安逸的生活，巴克必需呼喚起深藏內心的野性，來面對嚴峻的生存考驗，而最終它將回歸最原始的自己，並成為自己的主人… 極地的守護者。',
                'page_url'       => 'https://video.friday.tw/movie/detail/52283',
                'provider'       => NULL,
                'on_at'          => NULL,
                'off_at'         => NULL
            ),
            2 => 
            array (
                'video_id'       => 3,
                'platform_name'  => 'myVideo',
                'title'          => '天氣之子',
                'description'    => '高一那年夏天，帆高（醍醐虎汰朗 配音）離開位在離島的家鄉，獨自一人來到東京，拮据的生活迫使他不得不找份工作，最後來到一間專門出版奇怪超自然刊物的出版社擔任寫手。不久，東京開始下起連日大雨，彷彿暗示著帆高不順遂的未來，在這座繁忙城市裡到處取材的帆高邂逅了與弟弟相依為命，不可思議的美少女陽菜（森七菜 配音）。「等等就會放晴了喔。」陽菜這樣告訴著帆高，不久，頭頂的烏雲逐漸散去，耀眼的陽光灑落街道…',
                'page_url'       => 'https://www.myvideo.net.tw/details/0/308207',
                'provider'       => NULL,
                'on_at'          => NULL,
                'off_at'         => NULL
            ),
        ));
        
    }
}
