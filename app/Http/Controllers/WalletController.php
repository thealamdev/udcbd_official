<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function index()
    {
        return view('wallet.index');
    }

    public function wallet_store(Request $request)
    {
        $amount = $request->amount;

        $apikey = "644d781212b09"; //Your Api Key
        $clientkey = "644d781218a2e"; //Your Client Key
        $secretkey = "49646683"; //Your Secret Key

        $cus_name = $request->full_name;
        $cus_email = $request->email_add;

        //success url
        $success_url = "/wallet/success";
        //cancel url
        $cancel_url = "/wallet/cancel";
        $hostname = "https://udcbd.net";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://pay.walletmaxpay.com/checkout.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('api' => $apikey, 'client' => $clientkey, 'secret' => $secretkey, 'amount' => $amount, 'position' => $hostname, 'success_url' => $success_url, 'cancel_url' => $cancel_url, 'cus_name' => $cus_name, 'cus_email' => $cus_email),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    public function wallet_success()
    {
        $transactionId = $_GET['transactionId'];
        $paymentAmount = $_GET['paymentAmount'];
        $paymentFee = $_GET['paymentFee'];

        $transaction_id_walletmaxpay = $transactionId;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://pay.walletmaxpay.com/verify.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('transaction_id' => $transaction_id_walletmaxpay),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        if ($response == 1) {
            echo "success";
        } else {
            echo "Failed. Id Not Match";
        }
    }

    public function wallet_cancel()
    {
        dd('cancel');
    }
}
