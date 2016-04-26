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
    public function show(Request $request, $product_id)
    {
      $product= Product::find( $product_id);
      if($product->user_id ==  $request->user()->id)
      {
          return view('products.show',['product' => $product]);
      }
      else
      {
          return view('errors.503');
      }
    }
    public function edit(Request $request, $product_id)
    {   $product= Product::find( $product_id);
        if($product->user_id ==  $request->user()->id)
        {
            return view('products.edit',['product' => $product]);
        }
        else
        {
            return view('errors.503');
        }
    }
    public function destroy(Request $request, $product_id)
    {
        $product= Product::find( $product_id);
        if($product->user_id ==  $request->user()->id)
        {
            $product->delete();
            return redirect('/admin/portfolio');
        }
        else
        {
            return view('errors.503');
        }
    }
    public function update(Request $request,  $product_id)
    {
        $product= Product::find( $product_id);
        if($product->user_id ==  $request->user()->id)
        {
            $this->validate($request, [
                'name' => 'required|max:255',
                'image' => 'required|max:255',
                'category' => 'required|in:mobile,web,games,strategy'
            ]);
            $product->update([
                'name' => $request->name,
                'image' => $request->image,
                'category' => $request->category
            ]);
            return redirect('/admin/portfolio');
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
            'image' => 'required|max:255',
            'category' => 'required|in:mobile,web,games,strategy'
        ]);
        $request->user()->products()->create([
            'name' => $request->name,
            'image' => $request->image,
            'category' => $request->category
        ]);
        return redirect('/admin/portfolio');
    }

    public function create(Request $request)
    {
        return view('products.create');
    }

}
