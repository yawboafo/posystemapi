<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{

    public function createProduct(Request $request){

     //   $product = Product::create($request->all());


        return "hello world";

    }

    public function updateProduct(Request $request){

        $project = Product::updateOrCreate($request->all());


        return $project;

    }

    public function deleteProduct($id){


        $product= Product::find($id);
        $product->delete();


    }

    public function getAllProducts(){



        $products = Product::all();


        return $products;


    }



}
