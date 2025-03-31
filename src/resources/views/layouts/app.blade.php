<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>モバイルオーダーアプリ</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="font-sans bg-premium-light h-screen flex flex-col">
        <header class="h-20 p-5 border-b border-gray-200 bg-premium-dark shadow">
            <!-- サークル名などに変更して良さそう -->
             <!--  サークルのアイコン + うりあげかくにん　+ 編集 -->
            <h1 class="mt-1 text-xl text-white font-medium tracking-wide">モバイルオーダーアプリ</h1>
        </header>
        <div class="mt-6 mr-4 ml-4 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
            {{ $slot }}
        </div>
    </body>
</html>