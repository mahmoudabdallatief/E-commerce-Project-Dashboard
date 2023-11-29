<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brands',['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createbrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = $request->validate([
        'name' => 'required',
        ]);
        $name = strip_tags($request->input('name'));
        DB::table('brand')->insert([
        'brand' => $name,
        ]);
        
        
        return redirect('brands')->with('success', 'brand added successfully');
        if ($validator->fails()) {
            return redirect('createbrand')->withErrors($validator)->withInput();
        }

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
        
        $brands = Brand::findOrFail($id);

        return view('editbrand', ['brands' => $brands]);
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
   
        $validator = $request->validate([
            'name' => 'required',
        ]);

        $name = strip_tags($request->input('name'));

        DB::table('brand')->where('id', $id)->update([
            'brand' => $name,
        
        ]);

        return redirect('brands')->with('success-edit', 'brand edited successfully');
        if ($validator->fails()) {
            return redirect('editbrand')->withErrors($validator)->withInput();
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::where('brand', $id)->get();
    
    if($products->isEmpty()){
        $brand = Brand::find($id);
        $brand->delete();
      
        return redirect('brands')->with('success-delete', 'brand deleted successfully');
    }
    else{
        return redirect('brands')->with('error', 'You can\'t delete brand has been used');
    }
    }
}
