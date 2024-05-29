<?php

namespace App\Http\Controllers\Inertia;

use App\Http\Controllers\Controller;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class WalletController extends Controller
{

    public function index()
    {
        $userWallets=UserWallet::where('users_id',Auth::id())->get();
        return Inertia::render('Wallet/Index',compact('userWallets'))->rootView('layouts.inertia_.educrat');
    }

    public function save(Request $request)
    {

        try {
            $wallet = UserWallet::firstOrNew(['id' => Auth::id()]);
            $wallet->wallet_address = $request->input('address');
            $wallet->users_id = Auth::id();
            $wallet->save();

            return response()->json(['success', true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e]);
        }
    }
}
