<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',[
            'products'=> $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.create',[
            'categories'=> $categories,
            'suppliers'=> $suppliers
        ]);
        
        


        //->with('categories' , $categories, 'suppliers', $suppliers);
        //->with('categories' , $categories)->with('suppliers', $suppliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'description'=> 'required',
            'qty_stock'=> 'required|numeric|',
            'price'=> 'required|numeric|',
            'cat_id'=> 'required',
            'supplier_id'=> 'required'
        ]);

        $products = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'qty_stock' => $request->get('qty_stock'),
            'price' => $request->get('price'),
            'cat_id' => $request->get('cat_id'),
            'supplier_id' => $request->get('supplier_id'),
            
        ]);

        $products->save();
        flash(message: "Supplier created succesfully")->success();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product_id = $request->get('id');
        //$selected_product = Product::find($product_id);

        $products = Product::find($id);
        return view('products.show', ['product'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        $products = Product::find($id);
        return view('products.edit', [
            'products'=>$products,
            'categories'=>$categories,
            'suppliers'=>$suppliers
         ]);
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
        $this->validate($request,[
            'name'=> 'required',
            'description'=> 'required',
            'qty_stock'=> 'required|numeric|',
            'price'=> 'required|numeric|',
            'cat_id'=> 'required',
            'supplier_id'=> 'required'
        ]);
        $products = Product::find($id);
       
        $products->name = $request->name;
        $products->description = $request->description;
        $products->qty_stock=$request->qty_stock;
        $products->price=$request->price;
        $products->cat_id=$request->cat_id;
        $products->supplier_id=$request->supplier_id;


        $products->save();
        flash(message: "Product updated succesfully")->success();
        return redirect()->route('products.index');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        flash(message: "Product deleted succesfully")->success();
        return redirect()->route('products.index');
    }
}
