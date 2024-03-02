<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Checkout\Paid;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-product|create-product|edit-product|delete-product', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-product', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-product', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-product', ['only' => ['destroy']]);
    }
    //
    public function index()
    {
        $checkout = Checkout::with('Camp')->paginate(5);
        return view('transactions.index', compact('checkout'));
    }
    public function update(Request $request, Checkout $checkout)
    {
        $checkout->is_paid = true;
        $checkout->save();
        // send mail
        Mail::to($checkout->User->email)->send(new Paid($checkout));
        $request->session()->flash('success', "Checkout With ID {$checkout->id} has been Updated!");
        return redirect(route('transaction.index'));
    }
}
