@if(session('message'))
    <script>
        alert('{{ session('message') }}');
    </script>
@endif
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="min-h-screen flex flex-col font-admin text-lg bg-white">

    <header class="bg-[#e2e6e7]">
        <div class="flex justify-between">
            <div>
                <a href="{{route('admin.dashboard')}}"><button id="dashboard" class="p-4 bg-gray-800 text-white">管理者画面トップへ</button></a>
            </div>
            <div>
                <form method="POST" action="{{ route('admin.logout') }}" class="p-4">
                    @csrf
                    <button type="submit" class="text-smrounded-md">
                        ログアウト
                    </button>
                </form>
            </div>
        </div>

    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer>

    </footer>
</body>
</html>
