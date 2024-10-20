<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {

        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $request->validate([
            'barcode' => 'required|max:12', 
            'category' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'availQuantity' => 'required|numeric'
        ]);

        Product::create([
            'barcode' => $request->barcode,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'availQuantity' => $request->availQuantity
         ]);

        return redirect('/product');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'barcode' => 'required|max:12',
            'category' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'availQuantity' => 'required|numeric'
        ]);
    
        $product = Product::findOrFail($id);
        $product->update([
            'barcode' => $request->barcode,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'availQuantity' => $request->availQuantity
        ]);
    
        return redirect('/product');
    }
    
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect('/product');
    }
    
}
