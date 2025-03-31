<!DOCTYPE html>
<html lang="ja">
  <head?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>モバイルオーダーアプリ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/js/menu.js')
  </head>
  <body class="font-sans bg-premium-light h-screen flex flex-col">
      <header class="h-20 p-5 border-b border-gray-200 bg-premium-dark shadow">
        <!-- サークル名などに変更して良さそう -->
        <h1 class="mt-1 text-xl text-white font-medium tracking-wide">焼きそば屋で注文中</h1>
      </header>
        
      <!-- メニュー一覧 -->
      <main class="h-auto grow">
        <div class="h-full">
          <h2 class="text-xl mt-4 mr-4 ml-4 mb-6 text-premium-dark font-semibold border-b border-premium-accent pb-2">メニュー一覧</h2>
          <!-- データベースから引っ張ってきて、foreachを使う -->
          <form action="/api/orders" method="POST">
            <div class="space-y-6 px-4 py-6">
              <!-- Menu Item 1 -->
              <div class="flex items-center justify-between p-4 rounded-lg hover:bg-gray-50 transition-all duration-200">
                <div class="flex items-center">
                  <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center mr-4 shadow border border-gray-200">
                    <svg class="w-10 h-10 text-premium-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <rect width="20" height="20" x="2" y="2" stroke-width="2" rx="2" />
                    </svg>
                  </div>
                  <div>
                    <p class="font-medium text-lg text-premium-dark">焼きそば</p>
                    <p class="text-gray-700">250円</p>
                  </div>
                </div>
                <div class="flex items-center space-x-3">
                  <button type="button" class="w-8 h-8 rounded-full bg-premium-dark text-white flex items-center justify-center text-lg shadow-md hover:bg-premium-accent transition-colors decrease-btn" data-item="yakisoba">-</button>
                  <span class="w-6 text-center font-medium quantity-display">0</span>
                  <input type="hidden" name="yakisoba" value="0" class="quantity-input">
                  <button type="button" class="w-8 h-8 rounded-full bg-premium-dark text-white flex items-center justify-center text-lg shadow-md hover:bg-premium-accent transition-colors increase-btn" data-item="yakisoba">+</button>
                </div>
              </div>
              
              <!-- Menu Item 2 -->
              <div class="flex items-center justify-between p-4 rounded-lg hover:bg-gray-50 transition-all duration-200">
                <div class="flex items-center">
                  <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center mr-4 shadow border border-gray-200">
                    <svg class="w-10 h-10 text-premium-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <rect width="20" height="20" x="2" y="2" stroke-width="2" rx="2" />
                    </svg>
                  </div>
                  <div>
                    <p class="font-medium text-lg text-premium-dark">塩焼きそば</p>
                    <p class="text-gray-700">250円</p>
                  </div>
                </div>
                <div class="flex items-center space-x-3">
                  <button class="w-8 h-8 rounded-full bg-premium-dark text-white flex items-center justify-center text-lg shadow-md hover:bg-premium-accent transition-colors">-</button>
                  <span class="w-6 text-center font-medium">0</span>
                  <button class="w-8 h-8 rounded-full bg-premium-dark text-white flex items-center justify-center text-lg shadow-md hover:bg-premium-accent transition-colors">+</button>
                </div>
              </div>
              
              <!-- Menu Item 3 -->
              <div class="flex items-center justify-between p-4 rounded-lg hover:bg-gray-50 transition-all duration-200">
                <div class="flex items-center">
                  <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center mr-4 shadow border border-gray-200">
                    <svg class="w-10 h-10 text-premium-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <rect width="20" height="20" x="2" y="2" stroke-width="2" rx="2" />
                    </svg>
                  </div>
                  <div>
                    <p class="font-medium text-lg text-premium-dark">ソース焼きそば</p>
                    <p class="text-gray-700">250円</p>
                  </div>
                </div>
                <div class="h-40 flex items-center space-x-3">
                  <button class="w-8 h-8 rounded-full bg-premium-dark text-white flex items-center justify-center text-lg shadow-md hover:bg-premium-accent transition-colors">-</button>
                  <span class="w-6 text-center font-medium">0</span>
                  <button class="w-8 h-8 rounded-full bg-premium-dark text-white flex items-center justify-center text-lg shadow-md hover:bg-premium-accent transition-colors">+</button>
                </div>
              </div>

              <!-- Menu Item 4 -->
              <!-- <div class="flex items-center justify-between p-4 rounded-lg hover:bg-gray-50 transition-all duration-200">
                <div class="flex items-center">
                  <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center mr-4 shadow border border-gray-200">
                    <svg class="w-10 h-10 text-premium-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <rect width="20" height="20" x="2" y="2" stroke-width="2" rx="2" />
                    </svg>
                  </div>
                  <div>
                    <p class="font-medium text-lg text-premium-dark">焼きそば</p>
                    <p class="text-gray-700">250円</p>
                  </div>
                </div>
                <div class="flex items-center space-x-3">
                  <button class="w-8 h-8 rounded-full bg-premium-dark text-white flex items-center justify-center text-lg shadow-md hover:bg-premium-accent transition-colors">-</button>
                  <span class="w-6 text-center font-medium">0</span>
                  <button class="w-8 h-8 rounded-full bg-premium-dark text-white flex items-center justify-center text-lg shadow-md hover:bg-premium-accent transition-colors">+</button>
                </div>
              </div> -->
            </div>

            <!-- 合計金額と注文ボタン -->
            <footer class="h-40 w-full border-t border-gray-200 p-6 bg-gray-50 shadow">
              <div class="mb-6">
                <p class="text-xl text-premium-dark">買い物の合計: <span class="font-bold">750円</span></p>
              </div>
              <button type="submit" class="w-full bg-premium-dark text-white rounded-lg py-4 font-medium text-lg shadow-lg hover:bg-premium-accent transition-colors duration-300">決済に進む</button>
            </footer>

          </form> 
        </div> 
      </main>
      <!-- 決済確認画面 -->
  </body>
</html>
   