<?php

namespace App\Http\Controllers\Libs;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Ramsey\Uuid\Uuid;

class ApiDepay extends Controller
{

    private $client;
    private $apiKey;
    private $baseUrl = 'https://api.depay.com/v2';

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('DEPAY_API_KEY');
    }

    public function trackPayment(Payment $payment)
    {
        $detail=json_decode(json_encode($payment->detail));
        $response=Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-api-key' => $this->apiKey
        ])->get("{$this->baseUrl}/payments/$detail->id");

        return json_decode($response->body(), true);
    }


}
