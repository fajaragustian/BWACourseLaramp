<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function __construct()
    //  Add Permission Access
    {
        $this->middleware('permission:list-discount|create-discount|edit-discount|delete-discount', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-discount', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-discount', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-discount', ['only' => ['destroy']]);
    }
    // Discounts
    public function index()
    {
        $discounts = Discount::latest()->paginate(5);
        return view('auth.admin.discounts.index', ['discounts' => $discounts]);
    }
    // Create view with discounts
    public function create()
    {
        return view('auth.admin.discounts.create');
    }
    // Request create discounts
    public function store(Request $request)
    {
        $discounts = Discount::create($request->all());
        return redirect()->route('discounts.index', ['discounts' => $discounts])
            ->with('success', 'A New Discounts has been created');
    }
    public function show($id)
    {
        //
    }
    // Edit view with discounts
    public function edit($id)
    {
        $discounts = Discount::findOrFail($id);
        return view('auth.admin.discounts.edit', ['discount' => $discounts]);
    }
    // Request update with discounts
    public function update(Request $request, Discount $discount)
    {
        //
        $discount->update($request->all());
        return redirect()->back()
            ->with('success', "A Update {$discount->name} has been updated");
    }
    // Request delete with product
    public function destroy(Discount $discount, Request $request)
    {
        $discount->delete();
        return redirect()->route('discounts.index')
            ->with('success', "A Deleted {$discount->name} has been deleted");
    }
}
