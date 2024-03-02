<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Checkout\Store;
use App\Mail\Checkout\AfterCheckout;
use App\Models\Camp;
use App\Models\Checkout;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Midtrans;

class CheckoutController extends Controller
{
    //Midtrans
    public function __construct()
    {
        \Midtrans\Config::$serverKey    = env('MIDTRANS_SERVERKEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        \Midtrans\Config::$isSanitized  = env('MIDTRANS_IS_SANITIZED');
        \Midtrans\Config::$is3ds        = env('MIDTRANS_IS_3DS');
    }

    public function create(Camp $camp, Request $request)
    {

        // memanggil attribute pada model
        if ($camp->isRegistered) {
            $request->session()->flash('error', "You Already registered on {$camp->title} camp.");
            return redirect(route('home'));
        }

        return view('checkout.checkout', ['camp' => $camp]);
    }
    public function store(Store $request, Camp $camp)
    {
        //mapping request data
        $data =  $request->all();
        $data['user_id'] = Auth::id();
        // untuk scurity reason
        $data['camp_id'] = $camp->id;
        //update user data
        $user = Auth::user();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->working = $data['working'];
        //save data user
        $user->save();
        // create checkout
        $checkout = Checkout::Create($data);
        $this->getSnapRedirect($checkout);
        // sending email
        Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));
        return redirect(route('checkout.success'));
    }
    public function success()
    {
        //
        return view('checkout.checkout-success');
    }
    public function invoice(Checkout $checkout)
    {
        //
        return $checkout;
    }
    // Redirect Midtrans Handler
    public function getSnapRedirect(Checkout $checkout)
    {
        // $checkout->midtrans_booking_code = $checkout->id . 'CAMP-' . mt_rand(100000, 999999);
        $orderId =  $checkout->midtrans_booking_code = $checkout->id . 'CAMP-' . Str::random(5);
        $price = $checkout->Camp->price;
        $checkout->midtrans_booking_code = $orderId;
        $transaction_details = [
            'order_id' => $orderId,
            // Jika dolar
            // 'gross_amount' => $checkout->Camp->price * 1000,
            'gross_amount' => $checkout->Camp->price,
        ];
        $item_details[] = [
            'id' => $orderId,
            'price' => $price,
            'quantity' => 1,
            'name' => "Payment for {$checkout->Camp->title} Camp"
        ];
        $userData = [
            'first_name' => $checkout->User->name,
            'last_name' => "",
            'address' => "",
            'city' => "",
            'region' => "",
            'postal_code' => "",
            'phone' => $checkout->User->phone,
            'coutry_code' => "IDN",
        ];
        $customer_details = [
            'first_name' => $checkout->User->name,
            'last_name' => "",
            'email' => $checkout->User->email,
            'phone' => $checkout->User->phone,
            'billing_address' => $userData,
            'shipping_address' => $userData,
        ];
        $midtrans_params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        ];
        try {
            // get snap payment url
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $checkout->midtrans_url = $paymentUrl;
            $checkout->save();
            return $paymentUrl;
        } catch (Exception $e) {
            return false;
        }
    }
    public function midtransCallback(Request $request)
    {
        $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $checkout_id = explode('CAMP-', $notif->order_id)[0];
        $checkout = Checkout::find($checkout_id);

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge'
                $checkout->payment_status = 'pending';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $checkout->payment_status = 'paid';
            }
        } else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $checkout->payment_status = 'failed';
            }
        } else if ($transaction_status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $checkout->payment_status = 'failed';
        } else if ($transaction_status == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $checkout->payment_status = 'paid';
        } else if ($transaction_status == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $checkout->payment_status = 'pending';
        } else if ($transaction_status == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $checkout->payment_status = 'failed';
        }

        $checkout->save();
        return view('checkout/success');
    }
}
