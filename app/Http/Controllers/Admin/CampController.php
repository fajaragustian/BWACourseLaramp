<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use Illuminate\Http\Request;

class CampController extends Controller
{
    public function __construct()
    //  Add Permission Access
    {
        $this->middleware('permission:list-camp|create-camp|edit-camp|delete-camp', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-camp', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-camp', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-camp', ['only' => ['destroy']]);
    }
    // Camps
    public function index()
    {
        $camp = Camp::latest()->paginate(5);
        return view('auth.admin.camp.index', ['camp' => $camp]);
    }
    // Create view in camps
    public function create()
    {
        return view('auth.admin.camp.create');
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
