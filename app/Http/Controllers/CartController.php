<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Course;
use App\Models\CourseRegister;
use App\Models\Payment;
use App\Models\User;
use App\Models\UserBill;
use http\Env;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Jackiedo\Cart\Facades\Cart;
use Hexters\CoinPayment\CoinPayment;

class CartController extends Controller
{

    private \Jackiedo\Cart\Cart $cart;

    public function __construct()
    {
        $this->cart = Cart::name('wake_cart');
    }

    public function cartShow()
    {
        $cart = $this->cart;
        return view('public.cart', compact('cart'));
    }

    public function addItem($slug, $redirect = 'back')
    {
        $course = Course::whereSlug($slug)->first();
        if (!count($this->cart->getItems(['id' => $course->id]))) {
            $this->cart->addItem([
                'id' => $course->id,
                'title' => $course->name,
                'quantity' => 1,
                'price' => floatval($course->price),
                'extra_info' => [
                    'date_time' => [
                        'added_at' => time(),
                    ],
                    'image' => $course->course_src_image,
                    'url' => route('public.course', $course->slug)
                ]
            ]);
            flash()->addSuccess('Producto agregado');
            switch ($redirect) {
                case 'back':
                    return redirect()->back();

                case 'checkout':
                    return redirect()->route('cart.checkout');

            }
        }else{
            flash()->addWarning('Este producto ya se encuentra en su carrito');
        }
        return redirect()->back();
    }

    public function removeItem($hash)
    {
        $this->cart->removeItem($hash);
        flash()->addSuccess('Producto eliminado');
        return redirect()->back();
    }

    public function checkout()
    {
        CoinPayment::getstatusbytxnid("CPHB7PJNV3E1SHWIBXPXGL5ND6");
        $cart = $this->cart;
        $countries = Country::all()->pluck('name', 'id');
        if (count($cart->getDetails()?->items)) {
            return view('public.checkout', compact('cart', 'countries'));
        }

        return redirect()->back();
    }

    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'countries_id' => 'required',
            'city' => 'required',
            'cellphone' => 'required',
            'email' => 'required',
        ]);
        $cart = $this->cart;
        try {
            DB::beginTransaction();

            if (count($cart->getDetails()?->items)) {
                if (Auth::check()) {
                    //Usuario
                    $user = Auth::user();
                } else {
                    $user = User::whereEmail($request->email)->first();
                    if (!$user) {
                        $user = new User();
                        $user->fill($request->all());
                        $user->password = bcrypt($request->email);
                        $user->save();
                    }
                }
                //Factura
                $bill = new UserBill();
                $bill->fill($request->all());
                $courses = [];
                foreach ($cart->getDetails()->items as $item) {
                    $courses[$item->id] = $item->toArray();
                }

                $bill->uuid = Str::uuid();
                $bill->courses = $courses;
                $bill->amount = $cart->getTotal();
                $bill->payment_method = '';
                $bill->users_id = $user->id;
                $bill->save();

                $payment = new Payment();
                $payment->amount = $cart->getTotal();
                $payment->user_bills_id = $bill->id;
                $payment->source = 'depay';
                $payment->save();

                DB::commit();

//                switch ($method) {
//                    case 'coinbase':
//                        $link = $this->createTransaction($bill);
//                        break;
//                    case 'depay':
//                        $link = route('inertia.depay.checkout', $payment);
//                        break;
//                }

                return Inertia::render('Checkout/Index', compact('payment'));


            } else {
                flash()->addWarning(__('No se registran cursos para facturar'));
            }
            DB::rollBack();
        } catch (\Exception $e) {
            if (ENV('APP_DEBUG')) {
                dd($e);
            }
            DB::rollBack();
        }

    }

    public function success($userBillId)
    {
        $bill = UserBill::find($userBillId);
        if ($bill) {
            $this->cart->destroy();
            $this->cart = Cart::name('wake_cart');
            return view('public.success', compact('bill'));
        }
//        foreach ($bill->courses as $course) {
//            $courseReg = new CourseRegister();
//            $courseReg->courses_id = $course->id;
//            $courseReg->users_id = $bill->users_id;
//            $courseReg->user_bill_id = $bill->id;
//            $courseReg->created_user = $bill->users_id;
//            $courseReg->save();
//        }


//        return view('public.success', compact('bill'));
    }

    public function createTransaction($bill)
    {

        $transaction['order_id'] = $bill->uuid; // invoice number
        $transaction['amountTotal'] = (float)$bill->amount;
        $transaction['currency1'] = 'USD';
        $transaction['currency2'] = 'ETH';
        $transaction['note'] = 'Transaction note';
        $transaction['buyer_name'] = $bill->user->name;
        $transaction['buyer_email'] = $bill->user->email;
        $transaction['redirect_url'] = route('cart.success', $bill->uuid); // When Transaction was comleted
        $transaction['cancel_url'] = ''; // When user click cancel link
        $cart = $this->cart;
        foreach ($cart->getDetails()->items as $item) {
            $transaction['items'][] = [
                'itemDescription' => $item->title,
                'itemPrice' => (float)$item->price, // USD
                'itemQty' => (int)1,
                'itemSubtotalAmount' => (float)$item->price // USD
            ];
        }

        return CoinPayment::generatelink($transaction);
    }

}
