<footer class="bg-[#e2e6e7] py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-start">

        <!-- 左：Instagramロゴ -->
        <div>
            <img src="{{ asset('img/Instagram_Glyph_Black.png') }}" alt="Instagram" class="w-[30px]">
        </div>

        <!-- 右：GUIDE -->
        <div class="text-right text-sm space-y-1">
            <h3 class="font-bold underline underline-offset-2">GUIDE</h3>
            <p><a href="{{ route('register') }}">新規登録</a></p>
            <p><a href="{{ route('inquiry.form') }}">問い合わせ</a></p>
        </div>
    </div>

    <!-- 下部中央：コピーライト -->
    <div class="mt-6 text-center text-xs text-gray-600">
        <small>©Calmi ALL RIGHTS RESERVED.</small>
    </div>
</footer>
