@php
 $subscriptions = [
    ['name' => 'LightNight', 'description' => '定期便Aの説明', 'price' => 1000],
    ['name' => 'DeepNight', 'description' => '定期便Bの説明', 'price' => 2000],
    ['name' => 'PremiumNight', 'description' => '定期便Cの説明', 'price' => 3000],
 ];
@endphp
@extends('layouts.app')

@section('title', '定期便紹介')

@section('content')
{{-- ここに定期便紹介を表示する --}}
{{--定期便３の名前がデバイスによってははみ出すので名前を変更するか、CSSをいじる必要があります。--}}
{{--はみ出すデバイス:Samsung Galaxy 8, Galaxy Z Fold5 (iphoneSEはぎりぎり)--}}
{{-- ここでは簡単なHTMLとCSSで定期便の紹介を示す。 --}}
{{-- タブの実装のためにロジックではJSをいじる必要がありますが、ここでは簡単なHTMLとCSSでタブの構造を示す。 --}}
<div class="border-b border-[#201a1e]">
    <h1 class="font-black text-3xl text-center m-6 ">定期便紹介</h1>
</div>
<div class="p-6">
  <div class="tabs" data-controller="tab" data-tab-index-value="0">
    <div class="grid grid-cols-3" role="tablist" aria-label="Sample Tabs">
      <button
        class="text-base p-2 rounded-t-md border transition-colors hover:bg-[#d0b49f] aria-selected:bg-[#d0b49f]
        role="tab"
        aria-selected="true"
        aria-controls="panel-1"
        id="tab-1"
        tabindex="0"
        data-tab-target="tab"
        data-action="
          click->tab#selectTab
          keydown.left->tab#moveLeft
          keydown.right->tab#moveRight
          keydown.home->tab#moveFirst
          keydown.end->tab#moveLast
        "
        data-tab-index-param="0"
       >
        LightNight
      </button>
      <button
        class="text-base p-2 rounded-t-md border transition-colors hover:bg-[#d0b49f] aria-selected:bg-[#d0b49f]"
        role="tab"
        aria-selected="false"
        aria-controls="panel-2"
        id="tab-2"
        tabindex="-1"
        data-tab-target="tab"
        data-action="
          click->tab#selectTab
          keydown.left->tab#moveLeft
          keydown.right->tab#moveRight
          keydown.home->tab#moveFirst
          keydown.end->tab#moveLast
        "
        data-tab-index-param="1"
      >
        <p>DeepNight</p>
      </button>
      <button
        class="text-base p-2 rounded-t-md border transition-colors hover:bg-[#d0b49f] aria-selected:bg-[#d0b49f]"
        role="tab"
        aria-selected="false"
        aria-controls="panel-3"
        id="tab-3"
        tabindex="-1"
        data-tab-target="tab"
        data-action="
          click->tab#selectTab
          keydown.left->tab#moveLeft
          keydown.right->tab#moveRight
          keydown.home->tab#moveFirst
          keydown.end->tab#moveLast
        "
        data-tab-index-param="2"
      >
        LuxuryNight
      </button>
    </div>
    <div class="border p-6" id="panel-1" role="tabpanel" tabindex="0" aria-labelledby="tab-1" >
      <p>Content for the first panel</p>
        <p>
        お試し用<br>
        価格は{{ $subscriptions[0]['price'] }}円です。<br>
        </p>
        <div class="flex justify-center mb-6">
            <button class="btn-primary">
                定期便購入ページへ
            </button>
        </div>
    </div>
    <div class="border p-6" id="panel-2" role="tabpanel" tabindex="0" aria-labelledby="tab-2" hidden>
      <p>Content for the second panel</p>
      <div class="flex justify-center mb-2">
        <button class="btn-primary">
            定期便購入ページへ
        </button>
    </div>
  </div>
    <div class="border p-6" id="panel-3" role="tabpanel" tabindex="0" aria-labelledby="tab-3" hidden>
      <p>Content for the third panel</p>
        <div>
            <button class="btn-primary">
                定期便購入ページへ
            </button>
        </div>
    </div>
    </div>
    <div class="mb-10"></div>
    <div class="border-b border-[#201a1e]">
    </div>
    <div class="border-b border-[#201a1e] ">
        <h2 class="font-bold text-center text-xl text-[#201a1e] m-10">
            定期便の特徴
        </h2>
        <div class="flex justify-center mb-2">
            <span class="material-icons text-5xl">local_offer</span>
        </div>
        <p class="text-center text-sm text-[#201a1e] m-4 pb-10">
            定期便は毎月お届けするサービスです。<br>
            お好きな商品を選んで、定期的にお届けします。<br>
            定期便はお得な価格でご提供しています。<br>
            定期便の内容は月替わりです。<br>
        </p>
    </div>
    <div class="border-b border-[#201a1e] ">
        <h2 class="font-bold text-center text-xl text-[#201a1e] m-10">
            お届けについて
        </h2>
        <div class="flex justify-center mb-2  space-x-3">
            <span class="material-icons text-5xl">calendar_today</span>
            <span class="material-icons text-5xl">mail</span>
            <span class="material-icons text-5xl">local_shipping</span>
        </div>
        <p class="text-center text-sm text-[#201a1e] m-4 pb-10">
            定期便は毎月1日に発送されます。<br>
            お届け前にメールでお知らせします。<br>
            お届けは日本国内のみ対応しています。<br>
            お届け時間の指定はできません。<br>  
            ただし、地域によっては時間指定が可能な場合があります。<br> 
            詳細はご注文時にご確認ください。<br>
        </p>
    </div>
    <div class="border-b border-[#201a1e] m-2">
        <h2 class="font-bold text-center text-xl text-[#201a1e] m-10">
            お支払方法について
        </h2>
        <p class="text-center text-sm text-[#201a1e] m-4 pb-10 space-x-2">
            <span class="material-icons text-5xl">credit_card</span>
            <span class="material-icons text-5xl">account_balance</span>
            <span class="material-icons text-5xl">qr_code</span>
            <span class="material-icons text-5xl">currency_yen</span><br>
            クレジットカード、PayPay、銀行振込、代引きがご利用いただけます。<br>
            クレジットカードは毎月1日に自動引き落としされます。<br>
            PayPay、銀行振込、代引きはお届け時にお支払いください。<br>
        </p>
    </div>
    <div class="border-b border-[#201a1e]">
        <h2 class="font-bold text-center text-xl text-[#201a1e] m-10 ">
            定期便の解約について
        </h2>
        <div class="flex justify-center mb-2">
            <span class="material-icons text-5xl">no_encryption</span>
        </div>
        <p class="text-center text-sm text-[#201a1e] m-4">
            定期便の解約は解約専用ページから承っております。<br>
            解約は次回お届け日の2週間前までにご連絡ください。<br>
        </p>
        <div class="flex justify-center mb-6">
            <button class="btn-primary px-4 py-2">
                定期便解約ページへ
            </button>
        </div>
    </div>

@endsection
