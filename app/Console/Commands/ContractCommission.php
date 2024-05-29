<?php

namespace App\Console\Commands;

use App\Models\PaymentContract;
use App\Models\UserCommission;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ContractCommission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contracts:commissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica cuales son los contratos que no han sido pagados';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $contracts = PaymentContract::whereNull('executed_at')->get();


        foreach ($contracts as $paymentContract) {

            $data = json_decode(json_encode($paymentContract->wallets, JSON_PRETTY_PRINT));
            $commissions=json_decode(json_encode($paymentContract->commissions, JSON_PRETTY_PRINT));
            $response = $this->getApiData($data);

            if ($response) {
                DB::beginTransaction();
                try {
                    print_r($response);
                    $paymentContract->executed_at = now();
                    $paymentContract->transaction_hash = $response->transaction_hash;
                    $paymentContract->url = $response->url;
                    $paymentContract->save();

                    foreach ($commissions as $commission) {

                        $userCommission = new UserCommission();
                        $userCommission->user_id = $commission->id;
                        $userCommission->payment_contract_id = $paymentContract->id;
                        $userCommission->amount = $commission->amount;
                        $userCommission->save();
                    }
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    dd($e);
                }
            } else {

            }

        }


        return Command::SUCCESS;
    }

    public function getApiData($data)
    { 

        $response = Http::withHeaders([
            'Authorization' => 'Bearer 513c3cc4c10e446e7534ca21984c75ef',
        ])->timeout(120)->post('0.0.0.0:5000/pay_commissions', $data);
        if ($response->successful()) {
            $responseBody = $response->body();
            return (object)json_decode($responseBody, true);
        } else {
            $error = $response->body();
            Log::channel('contract')->error([$data, $error]);
            return false;
        }
    }
}
