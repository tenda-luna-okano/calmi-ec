<!-- メインヘッダー -->
<header class="bg-[#e2e6e7] h-20">
    <div class="max-w-7xl mx-auto px-4 h-full flex items-center justify-between">
        <!-- 左：検索フォーム -->
        <div class="flex items-center space-x-2 w-1/3">
        </div>

        <!-- 中央：ロゴ -->
        <div class="w-1/3 flex justify-center h-full">
            <img src="{{ asset('img/logo.png') }}" alt="ロゴ" class="h-full object-contain">
        </div>

        <!-- 右：アイコン -->
        <div class="w-1/3 flex justify-end space-x-4 items-center">
            <span class="material-icons-outlined">account_circle</span>
            <span class="material-icons-outlined">shopping_bag</span>
            <span class="material-icons-outlined">search</span>
        </div>
    </div>
</header>

<!-- サブヘッダー（メニュー） -->
<nav class="bg-[#e2e6e7] border-t border-gray-300">
    <div class="max-w-7xl mx-auto px-4 py-2 flex justify-center space-x-8 text-sm text-gray-700">
        <a href="#" class="hover:underline">定期便</a>
        <a href="#" class="hover:underline">ジャンル</a>
        <a href="#" class="hover:underline">コラム</a>
    </div>
</nav>
