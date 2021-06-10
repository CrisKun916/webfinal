<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Location;

class SupplierController extends Controller
{
    
    public function index()
    {
        
        $suppliers = Supplier::all();
        return view('suppliers.index', [
            'suppliers'=>$suppliers
        ]);
       
    }

    
    public function create()
    {

        $locations = Location::all();
        return view('suppliers.create')->with('locations' , $locations);
        
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'company_name'=> 'required',
            'phone_number'=> 'required|numeric|digits:9',
            'location_id'=> 'required'
        ]);

        $suppliers = new Supplier([
            'company_name' => $request->get('company_name'),
            'phone_number' => $request->get('phone_number'),
            'location_id' => $request->get('location_id')
        ]);

        $suppliers->save();
        flash(message: "Supplier deleted succesfully")->success();
        return redirect()->route('suppliers.index');
        
    }

   
    public function show($id)
    {
        $suppliers = Supplier::find($id);
        return view('suppliers.show', ['supplier'=>$suppliers]);
    }

    
    public function edit($id)
    {
        $locations = Location::all();
        $suppliers = Supplier::find($id);
        return view('suppliers.edit', [
            'suppliers'=>$suppliers,
             'locations'=>$locations
        ]);

    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'company_name'=> 'required',
            'phone_number'=> 'required|numeric|digits:9',
            'location_id'=> 'required'
        ]);

        $suppliers=Supplier::find($id);
        $suppliers->company_name=$request->company_name;
        $suppliers->phone_number=$request->phone_number;
        $suppliers->location_id=$request->location_id;

        $suppliers->save();

        flash(message: "Category updated succesfully")->success();
        return redirect()->route('suppliers.index');
        
    }

    
    public function destroy($id)
    {
        $suppliers = Supplier::findOrFail($id);
        $suppliers->delete();

        flash(message: "suppliers deleted succesfully")->success();
        return redirect()->route('suppliers.index');
    }
}
