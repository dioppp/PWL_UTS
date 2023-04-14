<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionModel;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trans = TransactionModel::join('users', 'users.id','=','transactions.user_id')
        ->join('shoes', 'shoes.id',',','transactions.shoe_id')
        ->join('bundles', 'bundles.id','=','transactions.bund_id')
        ->select('transactions.id as t_id, users.name as u_name, shoes.id as s_id, bundles.name as b_name, bundles.price as b_price, transactions.status as t_status')
        ->get();
        return view('admin.transaction')->with('data', $trans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
