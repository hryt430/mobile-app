<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ env('APP_NAME') }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="h-screen flex flex-col">
        <header>
            <div class="py-6 h-28 bg-gray-50">
                <h1 class="text-center text-3xl">焼きそば屋で<br>
                注文しています</h1>
            </div>
        </header>
        <main>
            <div class="bg-gray-50 shadow-gray-500 mt-4 p-8 h-48 flex flex-col items-center">
                <div class="text-center font-bold text-xl">
                    <h2>受取時間</h2>
                    <h2>13:00</h2>
                </div>
                <div class="text-center font-bold text-xl mt-3">
                    <h2>整理券番号</h2>
                    <h2>3</h2>
                </div>
           </div>
        </main>
        <footer class="flex-1">
            <div class="bg-gray-200 shadow-2xl h-full">
                <h2 class="text-3xl p-4">注文の商品</h2>
                <div class="menu-imgs space-y-3">
                    <img src="" alt="">
                    <img src="" alt="">
                    <img src="" alt="">
                </div>
            </div>
        </footer>      
    </body>
</html>