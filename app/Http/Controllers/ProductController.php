<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use App\LocalModels\Requestresponse;


use App\Utilities\Utility;
use Illuminate\Support\Facades\Validator;

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

            $product = new Product();

            $product->SKU = $request->input('SKU');
            $product->IDSKU = $request->input('IDSKU');
            $product->Name = $request->input('Name');
            $product->Description = $request->input('Description');
            $product->UnitPrice =  $request->input('UnitPrice');
            $product->Quantity =  $request->input('Quantity');
            $product->Ranking =  $request->input('Ranking');
            $product->Discount =  $request->input('Discount');
            $product->ImageUrl = $imageUrl;
            $product->isAvailable = $request->input('isAvailable');
            $product->Datecreated = $request->input('Datecreated');
            $product->isAvailable= $request->input('isAvailable');
            $product->Organization_id = $request->input('organization_id');
            $product->CategoryID =  $request->input('category_id');
            $saved =  $product->save();

            if ($saved){


                $response = new Requestresponse();
                $response->code = "200";
                $response->status = "Success";
                $response->message = "Product  was saved";
                $response->data = $product;


                $responseJSON = json_encode($response);


                return $responseJSON;


            }else{


                $response = new Requestresponse();
                $response->code = "500";
                $response->status = "Failed";
                $response->message = "Product   failed to save";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;

            }

        }catch (\Exception $exception){


            $response = new Requestresponse();
            $response->code = "500";
            $response->status = "Failed";
            $response->message = $exception;
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;
        }


    }

    public function updateProduct(Request $request){

        $idProduct = $request->input('id');


        try{


            if ( is_null($idProduct)){

                $response = new Requestresponse();
                $response->code = "100";
                $response->status = "Validate errors";
                $response->message = "Product  ID cannot be empty";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;


            }else{

                $product = Product::find($idProduct);

                if ( is_null($product)){

                    $response = new Requestresponse();
                    $response->code = "100";
                    $response->status = "Failed";
                    $response->message = "Product  does not exist";
                    $response->data = "null";


                    $responseJSON = json_encode($response);


                    return $responseJSON;

                }else{


                    /**   $category->Name = $request->input('Name');
                    $category->Description = $request->input('Description');
                    $category->Thumbnail = $request->input('Thumbnail');
                    $category->ImageUrl = $request->input('ImageUrl');
                    $category->Active = $request->input('Active');
                    $category->Organization_id = $request->input('Organization_id');


                    $saved =  $category->save();  **/






                    $variable =  $request->file('Image');
                    if ( empty ( $variable ) ){
                        $imageUrl = "";
                    }else{
                        $imageUrl = Utility::uploadImage($request,'Image');
                    }

                    $product = new Product();

                    $product->SKU = $request->input('SKU');
                    $product->IDSKU = $request->input('IDSKU');
                    $product->Name = $request->input('Name');
                    $product->Description = $request->input('Description');
                    $product->UnitPrice =  $request->input('UnitPrice');
                    $product->Quantity =  $request->input('Quantity');
                    $product->Ranking =  $request->input('Ranking');
                    $product->Discount =  $request->input('Discount');
                    $product->ImageUrl = $imageUrl;
                    $product->isAvailable = $request->input('isAvailable');
                    $product->Datecreated = $request->input('Datecreated');
                    $product->isAvailable= $request->input('isAvailable');
                    $product->Organization_id = $request->input('organization_id');
                    $product->CategoryID =  $request->input('category_id');

                    $saved =   Product::where('ProductID', '=', $idProduct)->update($product->toArray());
                    //   $saved =  $category->update($category->toArray());


                    if ($saved){


                        $response = new Requestresponse();
                        $response->code = "200";
                        $response->status = "Success";
                        $response->message = "Product  was updated";
                        $response->data = $product->toJson();


                        $responseJSON = json_encode($response);


                        return $responseJSON;


                    }else{


                        $response = new Requestresponse();
                        $response->code = "500";
                        $response->status = "Failed";
                        $response->message = "Product  failed to save";
                        $response->data = "null";


                        $responseJSON = json_encode($response);


                        return $responseJSON;

                    }

                }








            }




        }catch (\Exception $exception){

            $response = new Requestresponse();
            $response->code = "500";
            $response->status = "Failed";
            $response->message = $exception ;
            $response->data = "null";


            $responseJSON = json_encode($response);

            return $exception;


        }








    }

    public function deleteProduct($id){


        $product= Product::find($id);
        $product->delete();


    }

    public function getAllProducts(){



        $products = Product::all();





        if(is_null($products)){

            $response = new Requestresponse();
            $response->code = "100";
            $response->status = "Failed";
            $response->message = "Products  is empty";
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;

        }else{

            $response = new Requestresponse();
            $response->code = "200";
            $response->status = "Success";
            $response->message = "Products ";
            $response->data = $products;


            $responseJSON = json_encode($response);


            return $responseJSON;

        }



    }



}
