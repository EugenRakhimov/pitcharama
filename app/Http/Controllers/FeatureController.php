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

  public function edit(Request $request,$product_id, $feature_id)
  {
      $product= Product::find( $product_id);
      $feature = Feature::find($feature_id);
      if (($feature->product->user_id ==  $request->user()->id)&&($feature->product == $product))
      {
          return view('features.edit',['product'=>$product,'feature' => $feature]);
      }
      else
      {
          return view('errors.503');
      }
  }

  public function update(Request $request, $product_id, $feature_id)
  {
      $product= Product::find( $product_id);
      $feature = Feature::find($feature_id);
      if (($feature->product->user_id ==  $request->user()->id)&&($feature->product == $product))
      {
        $this->validate($request, [
            'name' => 'required|max:255',
            'feature_body' => 'required',
            'image_frame'=>'required|in:none,iphone5s,ipad,desktop'
        ]);
        $feature->update([
          'name' => $request->name,
          'feature_body' => $request->feature_body,
          'content' => $request->content,
          'image_frame' => $request->image_frame,
          'image' => $request->image
        ]);
        return redirect('/admin/portfolio/'.$product->id);
      }
      else
      {
          return view('errors.503');
      }
  }

  public function destroy(Request $request, $product_id, $feature_id)
  {
      $product= Product::find( $product_id);
      $feature = Feature::find($feature_id);
      if (($feature->product->user_id ==  $request->user()->id)&&($feature->product == $product))
      {
          $feature->delete();
          return redirect('/admin/portfolio/'.$product->id);
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
          'feature_body' => 'required',
          'image_frame'=>'required|in:none,iphone5s,ipad,desktop'
      ]);
      $productId = (int)$productId;
      $product = Product::find($productId);
      // echo  $request->feature_body;
      // exit();
      if($product->user_id ==  $request->user()->id)
      {
        $product->features()->create([
            'name' => $request->name,
            'feature_body' => $request->feature_body,
            'content' => $request->content,
            'image_frame' => $request->image_frame,
            'image' => $request->image
        ]);
        return redirect('/admin/portfolio/'.$productId);
      }
      else {
        return view('errors.503');
      }
  }
}
