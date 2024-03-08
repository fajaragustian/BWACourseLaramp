<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;

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
    // Request Create Camp
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:2|max:200',
            'price' => 'required|numeric|min_digits:3',
            'image' => 'nullable|image|max:1024',
            'desc' => 'required|string|max:1000',
        ]);
        $input = $request->all();
        // Update image jika ada yang diunggah
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/camps'), $fileName);
            $input['image'] = $fileName;
        }
        Camp::create($input);
        return redirect(route('camps.index'))->with('success', 'Created Camp Success!');
    }
    public function show($id)
    {
        //
    }

    // Edit View Camp
    public function edit($id)
    {
        $camp = Camp::findOrFail($id);
        return view('auth.admin.camp.edit', ['camp' => $camp]);
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required|string|min:2|max:200',
            'price' => 'required|numeric|min_digits:3',
            'image' => 'nullable|image|max:1024',
            'desc' => 'required|string|max:1000',
        ]);
        $input = $request->all();

        $camp = Camp::findOrFail($id);
        // Update image jika ada yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($camp->image && Storage::exists('public/camps/' . $camp->image)) {
                Storage::delete('public/camps/' . $camp->image);
            }
            $file = $request->file('image');
            $fileName = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/camps'), $fileName);
            $input['image'] = $fileName;
        }
        $camp->update($input);
        return redirect(route('camps.index'))->with('success', 'Created Camp Success!');
    }
    // Request Delete Camp
    public function destroy($id)
    {
        $camp = Camp::findOrFail($id);
        Storage::delete('public/camps/' . $camp->image);
        $camp->delete($id);
        return redirect()->route('camps.index')
            ->with('success', 'Camps deleted successfully');
    }
    public function trash()
    {
        $camp = Camp::onlyTrashed()->paginate(10);
        return view('auth.admin.camp.trash', ['camp' => $camp]);
    }
    public function restore($id)
    {
        $camp = Camp::onlyTrashed()->findOrFail($id);
        $camp->restore();
        return redirect()->route('camps.trash')->with('success', 'Camps restored successfully');
    }
    public function forceDelete($id)
    {
        $camp = Camp::onlyTrashed()->findOrFail($id);
        if ($camp->image) {
            Storage::delete('public/camps/' . $camp->image);
        }
        $camp->forceDelete();
        return redirect()->route('camps.trash')->with('success', 'Camps deleted permanent successfully');
    }
}
