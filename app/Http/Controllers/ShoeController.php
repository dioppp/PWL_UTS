<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\ShoeModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shoe = ShoeModel::all();
        return view('customer.shoe')->with('data', $shoe);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.add_shoe')->with('data_form', route('shoe.store'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:30',
            'color' => 'required|string|max:15',
            'material' => 'required|string|max:15',
            'user_id' => 'required'
        ]);

        $output = ShoeModel::create($request->except(['_token']));
        return redirect()->route('shoe.index');
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
        $shoe = ShoeModel::find($id);
        return view('customer.add_shoe')
        ->with('data', $shoe)
        ->with('data_form', route('shoe.update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand' => 'required|string|max:30',
            'color' => 'required|string|max:15',
            'material' => 'required|string|max:15',
            'user_id' => 'required|exists:users,id|unique:shoes,id,'.$id,
        ]);

        $output = ShoeModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect()->route('shoe.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ShoeModel::where('id','=',$id)->delete();
        return redirect()->route('shoe.index');
    }
}
