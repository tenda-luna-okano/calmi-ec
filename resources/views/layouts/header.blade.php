<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<style>

    {{--ジャンルごとの商品--}}
    #category{
        display:none;
        z-index:9999;
        width:100vw;
        height:auto;
        background:#e4d4c8;
        position:absolute;
    }
    {{--検索ボックス--}}
    #search{

        width: 70%;
        margin: auto;
        padding: 30px 20px;
        display: none;
        text-align: center;
        position: fixed;

        background: #e4d4c8;
        z-index:9999;
    }
    {{--ポップアップの表示のさい背景を暗くする--}}

    .modal{
        display:none;
        position:fixed;
        width:100vw;
        height:100vh;
        background: rgba(0,0,0,0.5);

        
    }
    .field{
        display: flex;
		justify-content: space-between;
    }
</style>
<div class="modal"style="z-index:9998;"></div>
<div id="header" style="z-index:9999; position:relative">
    
    <!--検索ボックス-->
    <div name="search" id="search">
    <form action="{{route('search.results')}}" method="POST">
        @csrf
        <input type="text" name="search" class="w-3/4" placeholder="キーワードを入力">


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
            <a href="/subscription/index" class="hover:underline">定期便</a>
            <span id="categoryButton" class="hover:underline">ジャンル</span>
            <a href="/columns/index" class="hover:underline">コラム</a>
        </div>
    </nav>

    <!--ジャンルの項目表示-->
    <center>
        <div id="category">
            <span style="font-size:30px;">ジャンル</span>
            <br>
            <div class="field">
                <li>
                    <a href="{{route('search.results.category',['idName'=>'アロマ'])}}">
                        アロマ<img class="category" id="アロマ" src="{{ asset('img/ピローミスト.png') }}" alt="" style="width:60%;">
                    </a>
                </li>
                <li>
                    <a href="{{route('search.results.category',['idName'=>'フード'])}}">
                        フード<img class="category" id="フード" src="{{ asset('img/GABAチョコレート.png') }}" alt="" style="width:60%;">
                    </a>

                </li>
            </div>
            <br>
            <div class="field">
                <li>
                    <a href="{{route('search.results.category',['idName'=>'タッチ'])}}">
                        タッチ<img class="category" id="タッチ" src="{{ asset('img/温感ジェル.png') }}" alt="" style="width:60%;">
                    </a>

                </li>
                <li>
                    <a href="{{route('search.results.category',['idName'=>'ご褒美スイーツ'])}}">
                        ご褒美スイーツ<img class="category" id="ご褒美スイーツ" src="{{ asset('img/マカロン.png') }}" alt="" style="width:60%;">
                    </a>
                    
                </li>
            </div>
            <br>
        </div>

    </center>
</div>

<script>
    //ヘッダーの虫眼鏡(検索)ボタン押した処理  
    $('#searchButton').on('click',function(){
        $('.modal').css('display','block'),
        $('#search').css('display','block'),
        $('#category').css('display','none'),
        $('#search').css({
            top:'50%',left:'50%',transform: 'translate(-50%, -50%)'
        });
    })

    //ヘッダーのジャンルを押したときに商品ジャンルを表示する処理
    $('#categoryButton').on('click',function(){
        $('#category').css('display','block'),
        $('.modal').css('display','block'),
        $('#search').css('display','none')
    })

    //検索ボタン、ジャンルの表示をやめる処理
    $('.modal').on('click',function(){
        $('#category').css('display','none'),
        $('.modal').css('display','none'),
        $('#search').css('display','none')

    })
</script>