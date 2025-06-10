@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
    {{-- 商品画像 --}}
    <div class="flex item-start justify-center">
        <div class="ltr w-1/2 mr-8">
            {{-- 商品画像を出力 --}}
            {{-- 本番はちゃんとしたルートのアイテムを表示 --}}
            {{-- <img src="{{ asset('storage/' . $review->img) }}" alt="商品画像"> --}}
            {{-- テスト画像の代わり --}}
            <img class="mx-4 pe-8" src="https://placehold.jp/150x150.png" alt="ダミー">
        </div>
        {{-- 商品説明 --}}
        <div class="rtl w-1/2 mx-8">
            <div class="ml-2">
                {{-- ジャンル --}}
                <p class="text-xl">ジャンル</p>
                {{-- 商品名 --}}
                <p class="mt-4 text-8xl">商品名</p>
            </div>
            <div class="flex">
                {{-- 評価,本番は数字はDBから取得 --}}
                <p class="flex-1 text-sm mt-4">☆4.2(8)</p>
                <a class="flex-1 text-xs mt-4 ml-2" href="#review">レビューを表示</a>
            </div>
            {{-- 値段 --}}
            <div class="flex">
                <div class="flex flex-1">
                    <p>￥</p>
                    {{-- テーブルから値段を取得 --}}
                    <p>12,300</p>
                </div>
                <div class="flex-1 border-black">
                    <p>(TAX IN)</p>
                </div>
            </div>
            <div class="flex">
                {{-- 数字変更 --}}
                {{-- <div class="flex flex-1 bg-white border-black">
                    <button class="flex-1">-</button>
                    <p class="flex-1 text-center mt-4">1</p>
                    <button class="flex-1">+</button>
                </div>
                <div class="container"> --}}

                <div class="flex flex-1 ">
                    <div class="bg-white w-auto" ><button id="down">－</button></div>
                    <div class="w-10px"><input type="text" value="1"  id="textbox"></div>
                    <div class="bg-white w-1/3"><button  id="up">＋</button></div>
                </div>

                {{-- <button class="button resetbtn" id="reset">RESET</button> --}}

                {{-- カートに入れるボタン --}}
                <div class="flex-1 px-8">
                    <button class="btn-primary text-xs px-8">カートに入れる</button>
                </div>
            </div>
            {{-- 数量変更時のエラーメッセージ --}}
            <div>
                <p>error</p>
            </div>
        </div>
    </div>
    <h2>商品特徴</h2>
        <hr class="py-8">
    <div class="my-8 py-8">
        <p class="py-8">ジッパーの開口部分が広くて開けやすいポーチは、開けると中に何が入っているか一目瞭然。見た目の割りに大容量なので、旅行時にも活躍すること間違いなし。フランスの地方によくあるバスルームのタイルからインスピレーションを受けたレトロなヴィンテージ調のフラワーパターンが乙女心をくすぐります</p>
    </div>
    <hr>
    <div class="flex py-8">
        <h2 id="review" class="flex-1">レビュー</h2>
        <button class="flex-1 text-right">レビューを投稿する</button>
    </div>
    <hr>
    {{-- 最初はレビューを2件まで表示 --}}
    <div  class="py-4">
        <div class="bg-white py-4">
            <p>☆☆☆★★</p>
            <div>
                <h3>タイトル</h3>
                <p>年代</p>
                <p>10代</p>
                <p>2025/02/12</p>
            </div>
            <p>レビュー内容</p>
            <p>この商品はよかったです。</p>
        </div>
        <div class="bg-white py-4 mt-4">
            <p>☆☆☆★★</p>
            <div>
                <h3>タイトル</h3>
                <p>年代</p>
                <p>10代</p>
                <p>2025/02/12</p>
            </div>
            <p>レビュー内容</p>
            <p>この商品はよかったです。</p>
        </div>
        <div class="text-right"><button>もっと見る</button></div>
    </div>
    
    <hr>
    {{-- 関連商品表示 --}}
    <p>このアイテムが気になった人はこちらも気になっています。</p>
    {{-- 商品５個表示 --}}
    <div class="flex bg-white px-4 py-3">
        <div class="flex-1 px-2 ">
            <img src="https://placehold.jp/150x150.png">
            <p>商品名</p>
        </div>
        <div class="flex-1 px-2">
            <img src="https://placehold.jp/150x150.png">
            <p>商品名</p>
        </div>
        <div class="flex-1 px-2">
            <img src="https://placehold.jp/150x150.png">
            <p>商品名</p>
        </div>
        <div class="flex-1 px-2">
            <img src="https://placehold.jp/150x150.png">
            <p>商品名</p>
        </div>
        <div class="flex-1 px-2">
            <img src="https://placehold.jp/150x150.png">
            <p>商品名</p>
        </div>
    </div>
    <script>
        (() => {
  //HTMLのid値を使って以下のDOM要素を取得
  const downbutton = document.getElementById('down');
  const upbutton = document.getElementById('up');
  const text = document.getElementById('textbox');
  const reset = document.getElementById('reset');

  //ボタンが押されたらカウント減
  downbutton.addEventListener('click', (event) => {
  //0以下にはならないようにする
  if(text.value >= 1) {
    text.value--;
  }
  });

  //ボタンが押されたらカウント増
  upbutton.addEventListener('click', (event) => {
    text.value++;
  })

  //ボタンが押されたら0に戻る
  reset.addEventListener('click', (event) => {
    text.value = 0;
  })

})();

    </script>
@endsection
