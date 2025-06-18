<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
          $products = [
            // --- アロマ ---
            ['item_name' => 'エッセンシャルオイル', 'item_category' => 1, 'item_price' => 1800, 'item_detail_explanation' => '植物の力をぎゅっと閉じ込めた、100%天然のエッセンシャルオイル。数滴垂らせば、空間が癒しの香りに包まれます。気分に合わせたブレンドで、心も整うひとときを。'],
            ['item_name' => 'ピローミスト', 'item_category' => 1, 'item_price' => 1200, 'item_detail_explanation' => '眠る前に枕へひと吹き。ラベンダーとオレンジの香りがふんわり広がり、穏やかな眠りに誘ってくれます。寝つきが悪い夜の味方に。'],
            ['item_name' => 'アロマバスパウダー', 'item_category' => 1, 'item_price' => 800, 'item_detail_explanation' => '湯船に溶かすとやさしい香りが広がるパウダータイプの入浴剤。アロマと保湿成分で、心と肌を同時にリラックスさせてくれます。'],
            ['item_name' => 'スリープライトティーキャンドル', 'item_category' => 1, 'item_price' => 1000, 'item_detail_explanation' => 'やさしく灯る小さなキャンドル。ラベンダーとウッドの香りで、ベッドルームを穏やかな空間に変えてくれます。1日の終わりにぴったりの癒し。'],
            ['item_name' => '和ハーブのバスソルト', 'item_category' => 1, 'item_price' => 1100, 'item_detail_explanation' => 'ゆずやカボスなど、日本のハーブをブレンドしたバスソルト。心までほぐれるような、どこか懐かしい香りが魅力です。'],

            // --- フード ---
            ['item_name' => 'GABAチョコレートミニ', 'item_category' => 2, 'item_price' => 500, 'item_detail_explanation' => '気分がほっとほどけるGABA入りのチョコ。お仕事や家事の合間の気分転換にもおすすめなひと口サイズ。'],
            ['item_name' => 'ナイトプロテイン', 'item_category' => 2, 'item_price' => 1500, 'item_detail_explanation' => '夜専用のスロー吸収タイププロテイン。ホットミルクに溶かせば、甘くてやさしいナイトドリンクに。美容と快眠をサポート。'],
            ['item_name' => 'おやすみ甘酒', 'item_category' => 2, 'item_price' => 350, 'item_detail_explanation' => 'ノンアルコール＆砂糖不使用。米麹由来のやさしい甘みが広がる甘酒は、寝る前の腸活にもぴったりの1本です。'],
            ['item_name' => 'カフェインレスミルクティー', 'item_category' => 2, 'item_price' => 650, 'item_detail_explanation' => '紅茶本来の風味を残しつつ、カフェインはオフ。ミルクとの相性も抜群で、寝る前にほっとひと息つける癒しの1杯。'],
            ['item_name' => 'ナイトグミ', 'item_category' => 2, 'item_price' => 400, 'item_detail_explanation' => 'ラフマ葉＆テアニンなど睡眠をサポートする成分配合のナイトグミ。おやすみ前の新習慣にぴったりです。'],

            // --- タッチ ---
            ['item_name' => 'アイマスク（使い捨て）', 'item_category' => 3, 'item_price' => 300, 'item_detail_explanation' => 'ぽかぽか温まる使い捨てアイマスク。疲れた目元をじんわりほぐして、心もふわっと軽くなります。'],
            ['item_name' => 'かっさプレート', 'item_category' => 3, 'item_price' => 1000, 'item_detail_explanation' => '顔まわりや首筋にフィットする天然石のかっさ。寝る前のマッサージで、むくみやコリをすっきり流します。'],
            ['item_name' => '温感ジェル', 'item_category' => 3, 'item_price' => 1400, 'item_detail_explanation' => 'ぬるめの温感でじんわりリラックス。肩・腰・おなかなどに塗るだけで、温もりが広がるご褒美ジェルです。'],
            ['item_name' => 'マッサージローラー付きハンドクリーム', 'item_category' => 3, 'item_price' => 1600, 'item_detail_explanation' => 'マッサージしながら保湿ケアができる新感覚ハンドクリーム。日中のリフレッシュや、夜のリラックスに。'],
            ['item_name' => 'フットバーム', 'item_category' => 3, 'item_price' => 1200, 'item_detail_explanation' => 'がんばった足にご褒美を。シアバター配合で、かかとや足裏をしっとり整えながら、心地よい香りが広がります。'],

            // --- ご褒美スイーツ ---
            ['item_name' => 'メッセージ入りクッキーBOX', 'item_category' => 4, 'item_price' => 1100, 'item_detail_explanation' => '「今日もおつかれさま」など、やさしい言葉が書かれたクッキーの詰め合わせ。自分にも、大切な人にも贈りたくなる一品。'],
            ['item_name' => 'ナイトチョコ', 'item_category' => 4, 'item_price' => 600, 'item_detail_explanation' => '夜に食べても罪悪感の少ない、低GI＆ビターなチョコレート。リラックス素材をプラスした、大人のための甘やかし。'],
            ['item_name' => 'マカロン', 'item_category' => 4, 'item_price' => 1300, 'item_detail_explanation' => '上品でとろけるマカロン。ひと口で、心がとろける極上スイーツです。'],
            ['item_name' => 'ブラウニー', 'item_category' => 4, 'item_price' => 950, 'item_detail_explanation' => '濃厚でしっとりとした食感のチョコブラウニー。自分へのちょっとした“がんばったで賞”に。'],
            ['item_name' => 'グラノーラバー', 'item_category' => 4, 'item_price' => 700, 'item_detail_explanation' => 'ナッツやドライフルーツをぎゅっと固めた食物繊維たっぷりのバー。小腹満たしにもぴったりな、やさしい甘さです。'],
        ];

        foreach ($products as $p) {
            Products::create([
                'item_name' => $p['item_name'],
                'item_category' => $p['item_category'],
                'item_price' => $p['item_price'],
                'item_price_in_tax' => intval($p['item_price'] * 1.1),
                'seling_flg' => 1,
                'sale_id' => null,
                'item_detail_explanation' => $p['item_detail_explanation'],
                'item_img' => null,
                'item_stock' => 50,
            ]);
        }
    }
}
