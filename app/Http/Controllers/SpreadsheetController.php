<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mitni\Google\GoogleSpreadsheet;

use App\Product;
use App\Feature;
use Auth;
use App\User;

class SpreadsheetController extends Controller
{   private function store ($name, $image, $category)
    {
      $user = Auth::user();
      $product= $user->products()->create([
          'name' => $name,
          'image' =>$image,
          'category' =>$category
      ]);
      return $product;
    }
    private function store_feature($product, $name, $body, $image_frame, $image){
      $feature = $product->features()->create([
      'name' => $name,
      'feature_body' => $body,
      'image_frame' => $image_frame,
      'image' => $image
    ]);
    }

    private function load_features($product_id, $product, $client)
    {
      $features_file = $client->file("1jMWr23fPEf9UHZLRdZM2_ST5hqZhCMWYt0cTCkOOQpA");
      $features_sheet = $features_file->sheet("Sheet1");
      $result = true;
      $row = 2;
      while ($result ) {
        $features = $features_sheet->select(array("row" => "$row"));
        $row = $row + 1;
        if (count($features) == 0) {
          // echo "here";
          $result = false;
        }
        else {
          if($features[0]['product_id']==$product_id){
            $feature = $this->store_feature($product, $features[0]['name'],$features[0]['feature_body']
             ,$features[0]['image_frame']  ,$features[0]['image']);
          }
        }
      }
    }


    public function load($value='')
    {
      $path = base_path('credential.json');
      $client = GoogleSpreadsheet::getClient($path);
      $products_file = $client->file("13S44sM1RqxLOp0HSkTA0IPvIYsX02s1ie3QLoMAY9JY");
      $product_sheet = $products_file->sheet("Sheet1");
      $result = true;
      $row = 2;
      while ($result ) {
        $items = $product_sheet->select(array("row" => "$row"));
        $row = $row + 1;
        if (count($items) == 0) {
          // echo "here";
          $result = false;
        }
        else {
        // echo  $items[0]['Name'];
          $product = $this->store( $items[0]['Name'],$items[0]['Image'] ,$items[0]['Category'] );
          $this->load_features($items[0]['ID'], $product, $client);
        }
      }

      // $features_sheet->insert(array(
      //     "name" => "John",
      //     "product_id" => 23,
      //     "email" => "john@example.com"
      // ));

      return redirect('/admin/portfolio');
    }
}
