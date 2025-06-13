<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<style>
    .popup {
        width: 70%;
        margin: auto;
        padding: 30px 20px;
        display: none;
        text-align: center;
        position: fixed;
        background: white;
        z-index:9999;
    }
    .modal{
        display:none;
        position:fixed;
        width:100vw;
        height:100vh;
        background: rgba(0,0,0,0.5);
        z-index:9998;
    }
</style>

<div class="modal"></div>
<div name="search" class="popup">
  <form action="{{route('search.results')}}" method="POST">
    @csrf
    <input type="text" id="search" name="search" class="w-3/4" placeholder="キーワードを入力">

    <button type="submit" class="bg-[#d0b49f] text-white px-3 py-1.5 rounded text-sm">
      検索
    </button>
  </form>
</div>


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
            <span id="searchButton" class="material-icons-outlined">search</span>
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

<script>
    $('#searchButton').on('click',function(){
        $('.modal').css('display','block'),
        $('.popup').css('display','block'),
        $('.popup').css({
            top:'50%',left:'50%',transform: 'translate(-50%, -50%)'
        });
    })

    $('.modal').on('click',function(){
        $('.modal').css('display','none'),
        $('.popup').css('display','none')
    })
</script>