<?php

namespace App\Http\Controllers;

use App\Mail\PaymentNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use YooKassa\Client;

class PaymentController extends Controller
{
    public function purchase()
    {
        $client = new Client();
        $client->setAuth('471468', 'test_fzCPF_GXiHBTQxd1bFZMP81CqK7CeeJGKGRH_88y1Ig');
        $payment = $client->createPayment(
            array(
                'amount' => array(
                    'value' => 2.0,
                    'currency' => 'RUB',
                ),
                'confirmation' => array(
                    'type' => 'redirect',
                    'return_url' => 'https://becoolcorp.com/profile',
                ),
                'capture' => true,
                'description' => 'Заказ №72',
                'save_payment_method' => true,
            ),
            uniqid('134', true)
        );
        return redirect($payment->confirmation->confirmation_url);
    }

    public function notification(Request $request)
    {
        Mail::to('ivangostev07@gmail.com')->send(new PaymentNotificationMail($request->all()));
    }

}
