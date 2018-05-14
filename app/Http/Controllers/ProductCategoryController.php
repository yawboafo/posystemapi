<?php

namespace App\Http\Controllers;
use App\LocalModels\Requestresponse;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Utilities\Utility;
use Illuminate\Support\Facades\Validator;
class ProductCategoryController extends Controller
{


    public function createCategory(Request $request){



        try{



                $variable =  $request->file('Image');

                if ( empty ( $variable ) ){

                    $imageUrl = "";

                }else{

                    $imageUrl = Utility::uploadImage($request,'Image');
                }



                $category = new Category;

                $category->Name = $request->input('Name');
                $category->Description = $request->input('Description');
                $category->Thumbnail = $imageUrl;
                $category->ImageUrl = $imageUrl;
                $category->Active = $request->input('Active');
                $category->Organization_id = $request->input('Organization_id');
                $saved =  $category->save();



                if ($saved){


                    $response = new Requestresponse();
                    $response->code = "200";
                    $response->status = "Success";
                    $response->message = "category  was saved";
                    $response->data = $category;


                    $responseJSON = json_encode($response);


                    return $responseJSON;


                }else{


                    $response = new Requestresponse();
                    $response->code = "500";
                    $response->status = "Failed";
                    $response->message = "category   failed to save";
                    $response->data = "null";


                    $responseJSON = json_encode($response);


                    return $responseJSON;

                }


          //  }


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


    public function updateCategory(Request $request){

        $idCategory = $request->input('idCategory');


        try{


            if ( is_null($idCategory)){

                $response = new Requestresponse();
                $response->code = "100";
                $response->status = "Validate errors";
                $response->message = "category  Name cannot be empty";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;


            }else{

                $category = Category::where('idCategory',$idCategory)->first();

                if ( is_null($category)){

                    $response = new Requestresponse();
                    $response->code = "100";
                    $response->status = "Failed";
                    $response->message = "Category  does not exist";
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



                    $category = new Category;

                    $category->Name =$Name;
                    $category->Description = $request->input('Description');
                    $category->Thumbnail = $imageUrl;
                    $category->ImageUrl = $imageUrl;
                    $category->Active = $request->input('Active');
                    $category->Organization_id = $request->input('Organization_id');
                    $saved =  $category->save();


                    if ($saved){


                        $response = new Requestresponse();
                        $response->code = "200";
                        $response->status = "Success";
                        $response->message = "Category  was saved";
                        $response->data = $category->toJson();


                        $responseJSON = json_encode($response);


                        return $responseJSON;


                    }else{


                        $response = new Requestresponse();
                        $response->code = "500";
                        $response->status = "Failed";
                        $response->message = "Category   failed to save";
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
            $response->message = $exception;
            $response->data = "null";


            $responseJSON = json_encode($response);

            return $exception;


        }












    }


    public function deleteCategory(Request $request){

        $Name = $request->input('Name');
        $category = Category::where('Name',$Name)->first();



        if ( is_null($category)){

            $response = new Requestresponse();
            $response->code = "100";
            $response->status = "Failed";
            $response->message = "Category  does not exist";
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;

        }else {

            $deleted =  $category->delete();


            if($deleted){

                $response = new Requestresponse();
                $response->code = "200";
                $response->status = "Success";
                $response->message = "Category deleted";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;
            }else{
                $response = new Requestresponse();
                $response->code = "100";
                $response->status = "Failed";
                $response->message = "Category failed to delete";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;

            }

        }




    }

    public function getAllCategories(){



        $categories = Category::all();


        if(is_null($categories)){

            $response = new Requestresponse();
            $response->code = "100";
            $response->status = "Failed";
            $response->message = "Categories  is empty";
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;

        }else{

            $response = new Requestresponse();
            $response->code = "200";
            $response->status = "Success";
            $response->message = "Categories ";
            $response->data = $categories;


            $responseJSON = json_encode($response);


            return $responseJSON;

        }





    }



}


