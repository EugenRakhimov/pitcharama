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
      // $request['name'] = $name;
      // $request['image'] = $image;
      // $request['category'] = $category;
      // // $this->validate($request, [
      // //     'name' => 'required|max:255',
      // //     'image' => 'required|max:255',
      // //     'category' => 'required|in:mobile,web,games,strategy'
      // // ]);
      $user->products()->create([
          'name' => $name,
          'image' =>$image,
          'category' =>$category
      ]);

    }

    private function load_features($product_id)
    {

    }


    public function load($value='')
    {
      $path = base_path('credential.json');
      $client = GoogleSpreadsheet::getClient($path);
      $products_file = $client->file("13S44sM1RqxLOp0HSkTA0IPvIYsX02s1ie3QLoMAY9JY");
      $features_file = $client->file("1jMWr23fPEf9UHZLRdZM2_ST5hqZhCMWYt0cTCkOOQpA");
            // Get the sheet by title
      $product_sheet = $products_file->sheet("Sheet1");
      $features_sheet = $features_file->sheet("Sheet1");
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
        echo  $items[0]['Name'];
        $this->store( $items[0]['Name'],$items[0]['Image'] ,$items[0]['Category'] );
        $this->load_features($items[0]['ID']);
        }
      }

      // $features_sheet->insert(array(
      //     "name" => "John",
      //     "product_id" => 23,
      //     "email" => "john@example.com"
      // ));

      return redirect('/product');
    }
}
