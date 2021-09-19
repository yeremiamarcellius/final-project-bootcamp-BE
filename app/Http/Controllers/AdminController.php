<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class AdminController extends Controller
{
    //
    public function createProduct(){
        $categories = Category::all();
        return view('createProduct', compact('categories'));
    }

    public function storeProduct(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'image' => 'required'
        ]);

        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'_'.'.'.$extension;
        $path = $request->file('image')->storeAs('public/image', $fileNameToStore);


        Product::create([
            'productName' => $request->name,
            'productPrice' => $request->price,
            'productStock' => $request->stock,
            'productImage' => $fileNameToStore,
            'productCategoryId' => $request->category,
        ]);

        return redirect('/admin/home');
    } 

    public function showAllProduct(){
        $products = Product::all();
        return view('showAllProduct', compact('products'));
    }

    public function showProduct($id){
        $product = Product::FindOrFail($id);
        return view('showProduct', compact('product'));
    }

    public function editProduct($id){
        $product = Product::FindOrFail($id);
        $categories = Category::all();
        return view('editProduct', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'image' => 'required'
        ]);
        
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'_'.'.'.$extension;
        $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

        Product::FindOrFail($id)->update([
            'productName' => $request->name,
            'productPrice' => $request->price,
            'productStock' => $request->stock,
            'productImage' => $fileNameToStore,
            'productCategoryId' => $request->category,
        ]);
        return redirect('/');
    }

    public function deleteProduct($id){
        Product::destroy($id);
        return back();
    }
}
