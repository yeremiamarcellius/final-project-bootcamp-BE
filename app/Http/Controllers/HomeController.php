<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Faktur;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home(){
        $products = Product::all();
        $count = 0;
        return view('userHome', compact('products', 'count'));
    }

    public function addFaktur($id){
        $product = Product::FindOrFail($id);
        return view('addFaktur', compact('product'));
    }

    public function storeFaktur(Request $request, $id){
        $request->validate([
            'kuantitas' => 'required',
            'alamat' => 'required',
            'kodePos' => 'required',
        ]);

        $product = Product::FindOrFail($id);

        $total = $product->productPrice * $request->kuantitas;

        Faktur::create([
            'productId' => $id,
            'userId' => Auth::user()->id,
            'kuantitas' => $request->kuantitas,
            'alamat' => $request->alamat,
            'kodePos' => $request->kodePos,
            'total' => $total
        ]);

        return redirect('/home');
    }

    public function showFaktur(){
        $fakturs = Faktur::all();
        return view('showFaktur', compact('fakturs'));
    }

    public function editFaktur($id){
        $faktur = Faktur::FindOrFail($id);
        return view('editFaktur', compact('faktur'));
    }

    public function updateFaktur(Request $request, $id){
        $request->validate([
            'kuantitas' => 'required',
            'alamat' => 'required',
            'kodePos' => 'required',
        ]);

        $faktur = Faktur::FindOrFail($id);
        $total = $faktur->total / $faktur->kuantitas * $request->kuantitas;

        Faktur::FindOrFail($id)->update([
            'productId' => $id,
            'userId' => Auth::user()->id,
            'kuantitas' => $request->kuantitas,
            'alamat' => $request->alamat,
            'kodePos' => $request->kodePos,
            'total' => $total
        ]);
        return redirect('/home');
    }

    public function deleteFaktur($id){
        Faktur::destroy($id);
        return back();
    }

    public function printFaktur(){
        $fakturs = Faktur::all();
        $invoice = 1;
        $total = 0;
        return view('printFaktur', compact('fakturs', 'invoice', 'total'));
    }
}
