<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        $products = Product::all();
        return view('transactions.index',[
            'transactions' => $transactions,
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->order_qty);
        
        $transactions = Transaction::create([
            'total_price' => $request->total_payment,
            'cust_name' => $request->cust_name,
            'pay' => $request->payment,
            'change' => $request->change,
            'order_qty' => $request->order_qty,
        ]);
        $transactions->product()->attach($request->product_id);

        //$getStock = Product::where('product_id', $request->cust_name)->first();
        //$getStock->qty_stock;
        return redirect()->back();
        
        
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
        $transactions = Transaction::findOrFail($id);
        $transactions->delete();

        flash(message: "Transaction details deleted succesfully")->success();
        return redirect()->route('transactions.index');
    }
    public function listProduct(Request $request){
        $product_id = $request->get('id');
        
        $selected_product = Product::find($product_id);
        
        return Response::json([$selected_product]);
    }
}
