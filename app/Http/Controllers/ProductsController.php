<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category', 'brand'])
        ->orderBy('id', 'desc')
        ->get();
        
    return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent', '>', 0)->get();
        $brands = Brand::all();
        return view('create',['categories' => $categories,'brands' => $brands]);  //
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
            'price' => 'required|numeric',
            'count' => 'required|integer',
            'category' => 'required',
            'brand' => 'required',
            'describtion' => 'required|min:5',
            'offer' => 'required|numeric',
            'image.0' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'image.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

       

        $name = strip_tags($request->input('name'));
        $price = strip_tags($request->input('price'));
        $count = strip_tags($request->input('count'));
        $des = strip_tags($request->input('describtion'));
        $offer = strip_tags($request->input('offer'));
        $brand = $request->input('brand');
        $cat = $request->input('category');
        
        if(empty($request->input('date'))){
            $date = '1972-06-10 02:24:00';
        }
        else{
            $date = strip_tags($request->input('date'));
        }
       
        $file_names = $request->file('image');
        $array_img = [];
        $count_file = count($file_names);
        for ($i = 0; $i < $count_file; $i++) {
            $file = $file_names[$i];

            $new_img_name = md5(uniqid()) . '.' . $file->getClientOriginalExtension();
          
            $file->move(public_path('images'), $new_img_name);
            array_push($array_img, $new_img_name);
        }

        $implode = implode(",", $array_img);

        DB::table('prro')->insert([
            'name' => $name,
            'price' => $price,
            'count' => $count,
            'brand' => $brand,
            'cat' => $cat,
            'des' => $des,
            'cover' => $implode,
            'date' => $date,
            'offer' => $offer,
        ]);

        return redirect('products')->with('success', 'Product added successfully');
        if ($validator->fails()) {
            return redirect('products.create')->withErrors($validator)->withInput();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('parent', '>', 0)->get();
        $brands = Brand::all();
        $product = Product::findOrFail($id);
      
    // return view('products.edit', compact('product'));
        // $products = Product::where('id', '=', $id)->get();
        return view('edit', ['products' => $product,'categories' => $categories,'brands' => $brands]);
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
        $validator = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'count' => 'required|integer',
            'category' => 'required',
            'brand' => 'required',
            'describtion' => 'required',
            'offer' => 'required|numeric',
            'image.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        
        if ($validator->fails()) {
            return redirect('edit')->withErrors($validator)->withInput();
          
        }

        $name = strip_tags($request->input('name'));
        $price = strip_tags($request->input('price'));
        $count = strip_tags($request->input('count'));
        $des = strip_tags($request->input('describtion'));
        $offer = strip_tags($request->input('offer'));
        $date = strip_tags($request->input('date'));
        if(strip_tags($request->input('sub_date'))=='0000-00-00 00:00:00'){
$sub_date = '1972-06-10 02:24:00';
        }
        else{
            $sub_date = strip_tags($request->input('sub_date'));
        }
     
        $brand = $request->input('brand');
        $cat = $request->input('category');
        
        $file_names = $request->file('image');
        $array_img = [];
        @$count_file = count($file_names);
        for ($i = 0; $i < $count_file; $i++) {
            $file = $file_names[$i];

            $new_img_name = md5(uniqid()) . '.' . $file->getClientOriginalExtension();
          
            $file->move(public_path('images'), $new_img_name);
            array_push($array_img, $new_img_name);
        }

        $implode = implode(",", $array_img);
if($implode != NULL){
    DB::table('prro')->where('id', $id)->update([
        'cover' => $implode,
        
    ]);
}
        DB::table('prro')->where('id', $id)->update([
            'name' => $name,
            'price' => $price,
            'count' => $count,
            'brand' => $brand,
            'cat' => $cat,
            'des' => $des,
            'date' => $date ? $date : $sub_date,
            'offer' => $offer,
        ]);
      
        return redirect('products')->with('success-edit', 'Product edited successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('products')->with('success-delete', 'Product successfully deleted.');
    }
}
