<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class ChapaController extends Controller
{
    function initializeTransaction(Request $request)
    {
        $refNo = "chewata" . Str::random(6);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer CHASECK_TEST-nhdSZEc9rwCSxEpC4cOcCSLNqTTngppT',
            'Content-Type' => 'application/json',
        ])->post('https://api.chapa.co/v1/transaction/initialize', [
            "amount" => $request->price,
            "currency" => "ETB",
            "email" => "john@gmail.com",
            "first_name" => "John",
            "last_name" => "Smith",
            "phone_number" => "0912345678",
            "tx_ref" => $refNo,
            "callback_url" => "https://webhook.site/077164d6-29cb-40df-ba29-8a00e59a7e60",
            "return_url" => "http://127.0.0.1:8000/chapa/paid/{$refNo}",
            "customization" => [
                "title" => "Payment",
                "description" => "I love online payments."
            ]
        ]);


        $checkoutUrl = $response['data']['checkout_url'];

        return new RedirectResponse($checkoutUrl);
    }

    function verifyTransaction($txRef)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer CHASECK_TEST-nhdSZEc9rwCSxEpC4cOcCSLNqTTngppT',
        ])->get('https://api.chapa.co/v1/transaction/verify/' . $txRef);

        $info = json_decode($response->body())->data;
        // dd($info);

        return view('success', compact('info'));
    }
}
