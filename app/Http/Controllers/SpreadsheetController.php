<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mitni\Google\GoogleSpreadsheet;

use App\Product;
use App\Feature;

class SpreadsheetController extends Controller
{


    public function load($value='')
    {
      $path = base_path('credential.json');
      $client = GoogleSpreadsheet::getClient($path);
      $products_file = $client->file("13S44sM1RqxLOp0HSkTA0IPvIYsX02s1ie3QLoMAY9JY");
      $features_file = $client->file("1jMWr23fPEf9UHZLRdZM2_ST5hqZhCMWYt0cTCkOOQpA");
      // echo $client;
      // exit();
    }
}
