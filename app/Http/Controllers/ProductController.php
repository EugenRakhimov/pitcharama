<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

class ProductController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $products = Product::where('user_id', $request->user()->id)->get();
        return view('products.index',['products' => $products]);
    }
    public function show(Request $request)
    {

    }
    public function edit(Request $request, Product $product)
    {
        if($product->user_id ==  $request->user()->id)
        {
            return view('products.edit',['product' => $product]);
        }
        else
        {
            return view('errors.503');
        }
    }
    public function destroy(Request $request, Product $product)
    {
        if($product->user_id ==  $request->user()->id)
        {
            $product->delete();
            return redirect('/product');
        }
        else
        {
            return view('errors.503');
        }
    }
    public function update(Request $request, Product $product)
    {
        if($product->user_id ==  $request->user()->id)
        {
            $this->validate($request, [
                'name' => 'required|max:255',
                'category' => 'required|in:work,home,leisure'
            ]);
            $product->update([
                'name' => $request->name,
                'category' => $request->category
            ]);
            return redirect('/product');
        }
        else
        {
            return view('errors.503');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'category' => 'required|in:work,home,leisure'
        ]);
        $request->user()->products()->create([
            'name' => $request->name,
            'category' => $request->category
        ]);
        return redirect('/product');
    }

    public function create(Request $request)
    {
        return view('products.create');
    }

}
