<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Checkout\Store;
use App\Mail\Checkout\AfterCheckout;
use App\Models\Camp;
use App\Models\Checkout;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    //
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
}
