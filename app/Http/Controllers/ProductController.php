<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
     // Show all products
    public function index()
    {
        $products = Product::all();  // fetch all products from DB
        return view('products.index', compact('products'));  // send to view
    }

/*
    public function show(Request $request, Product $product)
    {



        return "<h2>{$product->name}</h2>
        <p>Price: Rs{$product->price}</p>
        <p>URL:{$request->url()}</p>";
    }
*/
    public function show(Request $request, Product $product)
    {


        try {
            return view('products.show', compact('product', 'request'));
        } catch (ModelNotFoundException $e) {
            return view('products.notfound'); // create this view
        }

    }
     public function display(Request $request, Product $product)
    {
        return "<h3>hello John</h3>
        <h2>{$product->name}</h2>
        <p>Price: Rs{$product->price}</p>
        <p>URL:{$request->url()}</p>";
    }

}
