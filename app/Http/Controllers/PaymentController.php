<?php

namespace App\Http\Controllers;

use App\Mail\PaymentNotificationMail;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use YooKassa\Client;

class PaymentController extends Controller
{
    public function purchaseSubscription(Request $request)
    {
        $data = $request->validate([
            'm' => 'required',
            'user_id' => 'required',
        ]);

        $price = ($data['m'] == 1 ? 200.00 : 999.00);
        $client = new Client();
        $client->setAuth('471468', 'test_fzCPF_GXiHBTQxd1bFZMP81CqK7CeeJGKGRH_88y1Ig');
        $payment = $client->createPayment(
            [
                'amount' => [
                    'value' => $price,
                    'currency' => 'RUB',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => 'https://becoolcorp.com/profile',
                ],
                'capture' => true,
                'description' => 'Подписка ' . $data['user_id'],
                "metadata" => [
                    'user_id' => $data['user_id'],
                    'product_type' => 'subscription'
                ],
                'save_payment_method' => true,
            ],
            uniqid('212', true)
        );

        return redirect($payment->confirmation->confirmation_url);
    }

    public function purchaseOrder($order)
    {
        $client = new Client();
        $client->setAuth('471468', 'test_fzCPF_GXiHBTQxd1bFZMP81CqK7CeeJGKGRH_88y1Ig');
        $payment = $client->createPayment(
            [
                'amount' => [
                    'value' => $order->totalPrice(),
                    'currency' => 'RUB',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => 'https://becoolcorp.com/profile',
                ],

                'capture' => true,
                'description' => 'Заказ ' . $order['id'],
                "metadata" => [
                    'order_id' => $order['id'],
                    'product_type' => 'order'
                ],
                'save_payment_method' => true,
            ],
            uniqid('121', true)
        );

        return redirect($payment->confirmation->confirmation_url);
    }

    public function notification(Request $request)
    {

        Mail::to('ivangostev07@gmail.com')->send(new PaymentNotificationMail($request->all()));
        $data = $request->all();

        if ($data['object']['status'] == 'succeeded') {
            if ($data['object']['metadata']['product_type'] == 'subscription') {
                $user = User::where('id', $data['object']['metadata']['user_id'])->first();
                $user['payment_method_id'] = $data['object']['payment_method']['id'];

                if ($data['object']['amount']['value'] == '200.00') {
                    $user['subscription_months'] = 1;
                } elseif ($data['object']['amount']['value'] == '999.00') {
                    $user['subscription_months'] = 12;
                }
                $user['day_pay'] = Carbon::now()->toDateString();
                $user['paid'] = 1;

                $user->update();
            } elseif ($data['object']['metadata']['product_type'] == 'order') {
                $order = Order::where('id', $data['object']['metadata']['order_id'])->first();
                $order['paid'] = 1;
                $order['status'] = 'В сборке';
                $order->update();
            }
        }

        return response(200)->setStatusCode(200);
    }

    public function renewal($user)
    {
        $client = new Client();
        $client->setAuth('471468', 'test_fzCPF_GXiHBTQxd1bFZMP81CqK7CeeJGKGRH_88y1Ig');
        $client->createPayment(
            array(
                'amount' => array(
                    'value' => $user['subscription_months'] == 1 ? 200.00 : 999.00,
                    'currency' => 'RUB',
                ),
                "metadata" => [
                    'user_id' => $user['id'],
                    'product_type' => 'subscription'
                ],
                'capture' => true,
                'payment_method_id' => $user['payment_method_id'],
                'description' => 'Подписка ' . $user['id'],
            ),
            uniqid('', true)
        );
    }

    public function autoRenewal() {
        $user = auth()->user();
        if ($user['autorenewal'] == 1) {
            $user['autorenewal'] = 0;
        } else {
            $user['autorenewal'] = 1;
        }
        $user->update();
        return back();
    }

}
