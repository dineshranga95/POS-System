<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->paginate(5);
        //dd($products);
        return view ('products.index')->with('list',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('products.createproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductstoreRequest $request)
    {
        $validated = $request->validated();
        $imageName="";
        if($request->hasFile('image')){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
        }
        $product=Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$imageName,
            'barcode'=>$request->barcode,
            'price'=>$request->price,
            'status'=>$request->status,

        ]);
        if(!$product){
            return redirect()->back()->with('error', 'sorry, there a error while creaing a product');
        }else{
            return redirect()->route('products.index')->with('success', 'your product have been created');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       return view ('products.update')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductstoreRequest $request, Product $product)
    {
        $validated = $request->validated();
        $imageName="";
        if($request->hasFile('image')){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
        }
        $product=Product::find($product->id);
        $product->name = $request->name;
        $product->description= $request->description;
        $product->image=$imageName;
        $product->price=$request->price;
        $product->status=$request->status;
        $product->save();

        return redirect()->route('products.index')->with('success', 'your product have been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
