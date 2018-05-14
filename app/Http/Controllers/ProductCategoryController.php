<?php

namespace App\Http\Controllers;
use App\LocalModels\Requestresponse;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Utilities\Utility;

class ProductCategoryController extends Controller
{


    public function createCategory(Request $request){


        $this->validate($request,[
            'image_name'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        ]);



        $var =   Utility::uploadImage($request,'ImageUrl');

       /** $category = new Category;



        $category->Name = $request->input('Name');
        $category->Description = $request->input('Description');
        $category->Thumbnail = $request->input('Thumbnail');
        $category->ImageUrl = $request->input('ImageUrl');
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

        }**/



        return $var;


    }


    public function updateCategory(Request $request){

        $Name = $request->input('Name');


        if ( is_null($Name)){

            $response = new Requestresponse();
            $response->code = "100";
            $response->status = "Validate errors";
            $response->message = "category  Name cannot be empty";
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;


        }else{

            $category = Category::where('Name',$Name)->first();

            if ( is_null($category)){

                $response = new Requestresponse();
                $response->code = "100";
                $response->status = "Failed";
                $response->message = "Category  does not exist";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;

            }else{


                $category->Name = $request->input('Name');
                $category->Description = $request->input('Description');
                $category->Thumbnail = $request->input('Thumbnail');
                $category->ImageUrl = $request->input('ImageUrl');
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

    public function getAllCategory(){



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


