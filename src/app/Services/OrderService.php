<?php
namespace App\Services;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class OrderService
{
    public function createOrder($data)
    {
        try {
            // トランザクション開始
            DB::beginTransaction();

            // 注文の作成
            $order = new Order();
            $order->userId = auth()->id(); // ログインユーザーのID
            $order->orderStatus = 'pending';
            $order->total_price = 0;
            $order->save();

            $totalPrice = 0;

            // 注文詳細の作成
            foreach ($data->input('products') as $productData) {
                $product = Product::findOrFail($productData['id']);

                $orderDetail = new OrderDetail();
                $orderDetail->orderId = $order->orderId;
                $orderDetail->productId = $product->productId;
                $orderDetail->quantity = $productData['quantity'];
                $orderDetail->price = $product->productPrice * $productData['quantity'];
                $orderDetail->save();

                $totalPrice += $orderDetail->price;
            }

            // 注文の合計金額を更新
            $order->total_price = $totalPrice;
            $order->save();

            // トランザクションをコミット
            DB::commit();

            return response()->json([
                'message' => '注文が正常に作成されました',
                'order' => $order,
                'total_price' => $totalPrice
            ], 201);

        } catch (\Exception $e) {
            // エラー時はロールバック
            DB::rollBack();

            return response()->json([
                'message' => '注文の作成に失敗しました',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}