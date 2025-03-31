<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Services\OrderService;
use App\Services\PayPayService;

class OrderController extends Controller
{   
    protected $orderService;
    protected $payPayService;

    public function __construct(OrderService $orderService, PayPayService $payPayService)
    {
        $this->orderService = $orderService;
        $this->payPayService = $payPayService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'exists:products,productId',
            'products.*.quantity' => 'integer|min:1'
        ]);

        try{
            // データベースに保存する
            $order = $this->orderService->createOrder($validated);
            // PayPayで請求処理
            $paymentResult = $this->payPayService->payment($order);
        } catch(\Exception $e){
            return response()->json([
                'message' => '注文作成中にエラーが発生しました。',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
