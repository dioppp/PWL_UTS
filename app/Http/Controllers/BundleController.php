<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\BundleModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Bundle\Bundle as BundleBundle;

class BundleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('admin.bundle')->with('data', BundleModel::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_bundle')
                    ->with('data_form', route('bundle.store'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            'name' =>'required|string|unique:bundles,name',
            'price' =>'required|numeric'
        ]);
        $data = BundleModel::create($req->except(['_token']));
        return redirect()->route('bundle.index')->with('message', 'Data Bundle Berhasil disimpan!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bundle = BundleModel::find($id);
        return view('admin.add_bundle')
        ->with('data', $bundle)
        ->with('data_form', route('bundle.update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:bundles,name,'.$id,
            'price' => 'required|numeric'
        ]);

        $output = BundleModel::where('id', '=',$id)->update($request->except(['_token', '_method']));
        return redirect()->route('bundle.index')->with('message', 'Data Bundle id = '.$id.' berhasil di-Update!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            BundleModel::findOrFail($id)->delete();
            return redirect()->route('bundle.index')->with('message', "Data deleted successfully!!");
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('bundle.index')->with('message', 'Cannot delete data due to foreign key constrains!!!');
        }
    }
}
