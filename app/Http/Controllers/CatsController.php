<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        return view('cats',['cats' => $cats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createcat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'parent' => 'required|integer',
            ]);
            $name = strip_tags($request->input('name'));
            $parent = strip_tags($request->input('parent'));
            DB::table('cat')->insert([
            'cat' => $name,
            'parent' =>$parent,
            ]);
            
            
            return redirect('cats')->with('success', 'cat added successfully');
            if ($validator->fails()) {
                return redirect('createcat')->withErrors($validator)->withInput();
            }
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
        $cats = Category::findOrFail($id);

        return view('editcat', ['cats' => $cats]);
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
            'parent' => 'required|integer',
            ]);
            $name = strip_tags($request->input('name'));
            $parent = strip_tags($request->input('parent'));
            DB::table('cat')->where('id', $id)->update([
            'cat' => $name,
            'parent' =>$parent,
            ]);
            
            
            return redirect('cats')->with('success-edit', 'cat edited successfully');
            if ($validator->fails()) {
                return redirect('editcat')->withErrors($validator)->withInput();
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
        $products = Product::where('cat', $id)->get();
    $cats= Category::where('id', $id)->where('parent','=',0)->get();
    if($products->isEmpty() && $cats->isEmpty()){
        $cat = Category::find($id);
        $cat->delete();
      
        return redirect('cats')->with('success-delete', 'cat deleted successfully');
    }
    else{
        return redirect('cats')->with('error-cat', 'You can\'t delete category has been used');
    }
    }
}
