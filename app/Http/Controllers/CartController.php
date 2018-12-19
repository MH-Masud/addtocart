<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
    	$products = DB::table('products')->get();
    	return view('welcome',compact('products'));
    }

    public function product(Request $request)
    {
    	$id = $request->input('id');
    	$product = DB::table('products')
    	              ->where('id',$id)
    	              ->first();
    	$output = array();
    	$output['name'] = $product->name;
    	$output['color'] = $product->color;
    	$output['unit'] = $product->unit;
    	$output['price'] = $product->price;

    	echo json_encode($output);
    }

    public function addcart(Request $request)
    {
    	$products = $request->all();
    	foreach ($products as $product) {
    		return $product->id;
    	}

    }
}
