<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{

    public function createProduct(Request $request){


        try{


            $variable =  $request->file('Image');
            if ( empty ( $variable ) ){
                $imageUrl = "";
                }else{
                $imageUrl = Utility::uploadImage($request,'Image');
            }
/*
 * 		'SKU',
		'IDSKU',
		'Name',
		'Desciprtion',
		'Quantity',
		'UnitPrice',
		'Discount',
		'isAvailable',
		'Ranking',
		'Datecreated',
		'DateUpdated',
		'Thumbnail',
		'ImageUrl'
 * */


            $product = new Product();

            $product->Name = $request->input('Name');
            $product->Description = $request->input('Description');
            $product->Thumbnail = $imageUrl;
            $product->ImageUrl = $imageUrl;
            $product->Active = $request->input('Active');
            $product->Organization_id = $request->input('Organization_id');
            $saved =  $category->save();



        }catch (\Exception $exception){


            $response = new Requestresponse();
            $response->code = "500";
            $response->status = "Failed";
            $response->message = "Organization   failed to save";
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;
        }


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
