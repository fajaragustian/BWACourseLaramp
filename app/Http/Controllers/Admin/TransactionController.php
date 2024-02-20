<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $checkout = Checkout::with('Camp')->whereUserId(Auth::id())->paginate(5);
        return view('transactions.index', ['checkout' => $checkout]);
    }
}
