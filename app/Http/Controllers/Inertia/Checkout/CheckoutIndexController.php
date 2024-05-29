<?php

namespace App\Http\Controllers\Inertia\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Libs\ApiDepay;
use App\Models\Country;
use App\Models\Course;
use App\Models\CourseRegister;
use App\Models\Payment;
use App\Models\PaymentContract;
use App\Models\User;
use App\Models\UserBill;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class CheckoutIndexController extends Controller
{


    public function index()
    {

        $countries = Country::all();

        return Inertia::render('Checkout/Index', compact('countries'));
    }

    public function setPayment(Request $request, Payment $payment)
    {

        try {

            if ($payment) {
                if ($request->_succeeded == true) {

                    $payment->detail = $request->all();
                    $payment->save();
                } elseif ($request->_false == true) {
                    $payment->status = 'R';
                } else {
                    return response(false);
                }
                $payment->detail = $request->all();
                $payment->save();
                return response([
                    'completed' => true,
                    'paymentDetail' => $payment->detail
                ]);


            }
        } catch (\Exception $e) {
            return response([
                'error' => $e->getMessage(),
                500
            ]);
        }
        return response(false);
    }

    public function trackPayment(Payment $payment)
    {

        $depayService = new ApiDepay();
        $transaction = json_decode(json_encode($depayService->trackPayment($payment)));

        if ($transaction->status == 'success') {
            $payment->status = 'A';
            $payment->response = json_encode($transaction);
            $payment->save();

            //Contratos a ejecutar
            //Por cada curso se genera un contrato que se debe ejecutar
            $contracts = $this->getContracts($payment);


            foreach ($contracts as $contract) {
                $paymentContract = new PaymentContract();
                $paymentContract->amount = $payment->amount;
                $paymentContract->payment_id = $payment->id;

                $paymentContract->wallets = $contract['contract'];
                $paymentContract->commissions = $contract['commissions'];
                $paymentContract->created_user_id = Auth::id();
                $paymentContract->save();
            }

            //Se actualiza la factura
            $userBill = $payment->userBill;
            if ($userBill->status == 'P') {
                $userBill->status = 'A';
                $userBill->save();

                foreach ($userBill->courses as $course) {
                    $courseReg = new CourseRegister();
                    $courseReg->courses_id = $course->id;
                    $courseReg->users_id = $userBill->users_id;
                    $courseReg->user_bill_id = $userBill->id;
                    $courseReg->created_user = $userBill->users_id;
                    $courseReg->save();
                }
            }
            return response()->json(['_succeeded' => true]);
        } else
            return response()->json(['_succeeded' => false]);
    }

    public function getContracts(Payment $payment)
    {
        $wallets = [];
        $firstLevelReferred = $payment->userBill?->user?->referred_user;
        $secondLevelReferred = $firstLevelReferred?->referred_user;

        foreach ($payment->userBill->courses as $course) {
            $temp= [];
            $courseDb = Course::find($course->id);
            $teacher = $courseDb->teacher;
            if (isset($firstLevelReferred->wallet)){
                $temp['contract']['wallets'][]=$firstLevelReferred->wallet->wallet_address;
                $temp['contract']['levels'][]=$firstLevelReferred->contract_roles_first_id;
                $temp['commissions']['first'] = [
                    'id' => $firstLevelReferred->id,
                    'role' => $firstLevelReferred->contract_roles_first_id,
                    'amount' => ($course->price * $firstLevelReferred->contractRoleFirst->percentage) / 100
                ];
            }

            if (isset($secondLevelReferred->wallet)){
                $temp['contract']['wallets'][]=$secondLevelReferred->wallet->wallet_address;
                $temp['contract']['levels'][]=$secondLevelReferred->contract_roles_second_id;
                $temp['commissions']['second']=[
                    'id' => $secondLevelReferred->id,
                    'role' => $secondLevelReferred->contract_roles_second_id,
                    'amount' => ($course->price * $firstLevelReferred->contractRoleFirst->percentage) / 100
                ];
            }

            if (isset($teacher->wallet)){
                $temp['contract']['wallets'][]=$teacher->wallet->wallet_address;
                $temp['contract']['levels'][]=$teacher->contract_roles_teacher_id;
                $temp['commissions']['teacher']=[
                    'id' => $teacher->id,
                    'role' => $teacher->contract_roles_teacher_id,
                    'amount' => ($course->price * $firstLevelReferred->contractRoleFirst->percentage) / 100
                ];
            }
            $temp['contract']['amount']=$course->price;
            $temp['amount']=$courseDb->price;
            $wallets[]=$temp;
        }

        return $wallets;
    }


    public function getApiData()
    {
        $client = new Client();
        $response = $client->request('POST', 'http://127.0.0.1:5000/pay_commissions');

        $statusCode = $response->getStatusCode();
        $content = $response->getBody()->getContents();

        return response()->json([
            'status' => $statusCode,
            'data' => json_decode($content)
        ]);
    }
}
