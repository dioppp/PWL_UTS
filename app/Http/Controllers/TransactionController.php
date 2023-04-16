<?php

namespace App\Http\Controllers;

use App\Models\BundleModel;
use App\Models\ShoeModel;
use App\Models\TransactionModel;
use App\Models\User;
use App\Rules\ExistInTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trans = TransactionModel::join('users', 'users.id','=','transactions.user_id')
        ->join('shoes', 'shoes.id','=','transactions.shoe_id')
        ->join('bundles', 'bundles.id','=','transactions.bund_id')
        ->select('transactions.id as t_id, users.name as u_name, shoes.id as s_id, bundles.name as b_name, bundles.price as b_price, transactions.status as t_status')
        ->get();
        if (Auth::user()->role==='admin') {
            return view('admin.transaction')->with('data', $trans);
        } else {
            return view('customer.transaction')->with('data', $trans);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $bundles = BundleModel::all();
        $shoes = ShoeModel::all();

        if (auth()->user()->role === 'admin') {
            return view('admin.add_transaction', compact('users', 'bundles', 'shoes'))
            ->with('data_form', route('trans.create'));
        } else {
            return view('customer.add_transaction', compact('bundles', 'shoes'))
            ->with('data_form', route('trans.create'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'shoe_id' => ['required', 'exists:shoes,id'],
            'bund_id' => ['required', 'exists:bundles,id'],
            'delivery' => 'required|in:Yes,No',
            'status' => 'required|in:pending,on process,done'
        ]);

        $output = TransactionModel::where('id', '=', $id)->update($request->except(['_token']));
        return redirect()->route('trans.index');
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
        $transaction = TransactionModel::find($id);
        return view('data', $transaction)
        ->with('data_form', route('trans.update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => ['required','unique:users,id,'.$id, 'exists:users,id'],
            'shoe_id' => ['required','unique:shoes,id,'.$id, 'exists:shoes,id'],
            'bund_id' => ['required', 'unique:bundles,id,'.$id, 'exists:bundles,id'],
            'delivery' => 'required|in:Yes,No',
            'status' => 'required|in:pending,on process,done'
        ]);

        $output = TransactionModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect()->route('trans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TransactionModel::where('id', '=', $id)->delete();
        return redirect()->route('trans.index');
    }
}
