<?php
namespace App\Services;

use PayPay\OpenPaymentAPI\Client;
use PayPay\OpenPaymentAPI\Models\OrderItem;
use PayPay\OpenPaymentAPI\Models\CreateQrCodePayload;

class PayPayService
{   
    // PayPay APIを呼び出して請求処理を行う
    public function payment($order)
    {   
        try {
            $isProduction = config('app.env') === 'production' ? true : false;
            $client = new Client([
                'API_KEY' => config('services.paypay.api_key'),
                'API_SECRET' => config('services.paypay.api_secret'),
                'MERCHANT_ID' => config('services.paypay.merchant_id')
            ], $isProduction);
            
            // データベースからとってくる
            $orderName = 'サンプル';                                       // 商品名等
            $price = $order['total_price'];                                // 決済金額
            $items = (new OrderItem())->setName($orderName)
                                    ->setQuantity(1)
                                    ->setUnitPrice(['amount' => $price, 'currency' => 'JPY']);

            $paypayMerchantPaymentId = 'mpid_' . rand() . time();       // PayPay決済成功時のWebhookに含めるユニークとなる決済ID
            $redirectUrl = route('paypay.complete');                    // PayPay決済成功後のリダイレクト先URL

            $CQPayload = new CreateQrCodePayload();
            $CQPayload->setOrderItems($items);
            $CQPayload->setMerchantPaymentId($paypayMerchantPaymentId);
            $CQPayload->setCodeType('ORDER_QR');
            $CQPayload->setAmount(['amount' => $price, 'currency' => 'JPY']);
            $CQPayload->setIsAuthorization(false);
            $CQPayload->setUserAgent($_SERVER['HTTP_USER_AGENT']);
            $CQPayload->setRedirectType('WEB_LINK');
            $CQPayload->setRedirectUrl($redirectUrl);

            $QRCodeResponse = $client->code->createQRCode($CQPayload);

            if ($QRCodeResponse['resultInfo']['code'] !== 'SUCCESS') {
                throw new \Exception('決済用QRコードが生成できませんでした');
            }

            Order::create([
                'price' => $price,
                'is_payment' => false,
                'paypay_merchant_payment_id' => $paypayMerchantPaymentId
            ]);

            DB::commit();

            return redirect()->to($QRCodeResponse['data']['url']);       // PayPayの決済画面に遷移

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
        }

        return [
            'status' => 'success',
            'message' => 'PayPayでの支払いが完了しました。',
            'order_id' => $order->id,
            'amount' => $order->amount,
        ];
    }
}
