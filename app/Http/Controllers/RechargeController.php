<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\BalanceTransaction;
use DB;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;

class RechargeController extends Controller
{
    /**
     * method for render recharge page
     * @param $id(user id)
     */
    public function RechargeBalance($id)
    {
        return view('backend.content.recharge-balance.index', compact('id'));
    }

    /**
     * method for recharge user account.
     * @param Request $request
     */
    public function RechargeBalanceStore(Request $request)
    {
        $request->validate(['amount' => 'required']);
        $recharge = Balance::updateOrCreate(
            ['user_id' => $request->user_id],
            ['balance' => DB::raw("balance + $request->amount")]
        );

        BalanceTransaction::create([
            'user_id' => $recharge->user_id,
            'balance_id' => $recharge->getKey(),
            'amount' => $request->amount,
            'transaction_id' => uniqid(),
            'method' => 'SuperAdmin'
        ]);

        return back()->withFlashSuccess('Recharge Successfully');
    }
}
