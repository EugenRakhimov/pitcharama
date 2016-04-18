<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Feature;

class FeatureController extends Controller
{
  public function create($productId)
  {
    return view('features.create',['productId' => $productId]);
  }

  public function edit(Request $request,Product $product, Feature $feature)
  {
    // echo $product;
    // echo $feature;
    // exit();
      if (($feature->product->user_id ==  $request->user()->id)&&($feature->product == $product))
      {
          return view('features.edit',['product'=>$product,'feature' => $feature]);
      }
      else
      {
          return view('errors.503');
      }
  }

  public function update(Request $request,Product $product, Feature $feature)
  {
      if (($feature->product->user_id ==  $request->user()->id)&&($feature->product == $product))
      {
        $this->validate($request, [
            'name' => 'required|max:255',
            'feature_body' => 'required'
        ]);
        $feature->update([
          'name' => $request->name,
          'feature_body' => $request->feature_body
        ]);
        return redirect('/product/'.$product->id);
      }
      else
      {
          return view('errors.503');
      }
  }

  public function destroy(Request $request, Product $product, Feature $feature)
  {
      if (($feature->product->user_id ==  $request->user()->id)&&($feature->product == $product))
      {
          $feature->delete();
          return redirect('/product/'.$product->id);
      }
      else
      {
          return view('errors.503');
      }
  }

  public function store(Request $request, $productId)
  {
      $this->validate($request, [
          'name' => 'required|max:255',
          'feature_body' => 'required'
      ]);
      $productId = (int)$productId;
      $product = Product::find($productId);
      // echo  $request->feature_body;
      // exit();
      if($product->user_id ==  $request->user()->id)
      {
        $product->features()->create([
            'name' => $request->name,
            'feature_body' => $request->feature_body
        ]);
        return redirect('/product/'.$productId);
      }
      else {
        return view('errors.503');
      }
  }
}
