<?php

namespace App\Http\Controllers;

use App\LocalModels\Requestresponse;
use Illuminate\Http\Request;
use App\Models\Organizationcategory;

class OrganizationsCategoriesController extends Controller
{
    public function createOrganizationcategory(Request $request){



        $organizationCategory = new Organizationcategory;



        $organizationCategory->OrganizationCategoryName = $request->input('OrganizationCategoryName');
        $organizationCategory->OrganizationCategoryDescription = $request->input('OrganizationCategoryDescription');
        $organizationCategory->OrganizationCategoryType = $request->input('OrganizationCategoryType');


        $saved =  $organizationCategory->save();



         if ($saved){


         $response = new Requestresponse();
         $response->code = "200";
         $response->status = "Success";
         $response->message = "Organization Category was saved";
         $response->data = $organizationCategory->toJson();


         $responseJSON = json_encode($response);


          return $responseJSON;


     }else{


         $response = new Requestresponse();
         $response->code = "500";
         $response->status = "Failed";
         $response->message = "Organization Category  failed to save";
         $response->data = "null";


         $responseJSON = json_encode($response);


         return $responseJSON;

     }




    }


    public function updateOrganizationcategory(Request $request){

        $OrganizationCategory_id = $request->input('OrganizationCategory_id');


        if ( is_null($OrganizationCategory_id)){

            $response = new Requestresponse();
            $response->code = "100";
            $response->status = "Validate errors";
            $response->message = "Organization Category ID cannot be empty";
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;


        }else{

            $organizationCategory = Organizationcategory::find($OrganizationCategory_id);

            if ( is_null($organizationCategory)){

                $response = new Requestresponse();
                $response->code = "100";
                $response->status = "Failed";
                $response->message = "Organization Category does not exist";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;

            }else{


                $organizationCategory->OrganizationCategoryName = $request->input('OrganizationCategoryName');
                $organizationCategory->OrganizationCategoryDescription = $request->input('OrganizationCategoryDescription');
                $organizationCategory->OrganizationCategoryType = $request->input('OrganizationCategoryType');


                $saved =  $organizationCategory->save();

                if ($saved){


                    $response = new Requestresponse();
                    $response->code = "200";
                    $response->status = "Success";
                    $response->message = "Organization Category Updated";
                    $response->data = $organizationCategory->toJson();


                    $responseJSON = json_encode($response);


                    return $responseJSON;


                }else{


                    $response = new Requestresponse();
                    $response->code = "500";
                    $response->status = "Failed";
                    $response->message = "Organization Category  failed to update";
                    $response->data = "null";


                    $responseJSON = json_encode($response);


                    return $responseJSON;

                }

            }








        }










        return $category;

    }


    public function deleteOrganizationcategory( Request $request){

        $id = $request->input('OrganizationCategory_id');

        $organizationCategory = Organizationcategory::find($id);

        if ( is_null($organizationCategory)){

            $response = new Requestresponse();
            $response->code = "100";
            $response->status = "Failed";
            $response->message = "Organization Category does not exist";
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;

        }else {

           $deleted =  $organizationCategory->delete();


           if($deleted){

               $response = new Requestresponse();
               $response->code = "200";
               $response->status = "Success";
               $response->message = "Organization Category deleted";
               $response->data = "null";


               $responseJSON = json_encode($response);


               return $responseJSON;
           }else{
               $response = new Requestresponse();
               $response->code = "100";
               $response->status = "Failed";
               $response->message = "Organization Category failed to delete";
               $response->data = "null";


               $responseJSON = json_encode($response);


               return $responseJSON;

           }

        }




    }

    public function getAllOrganizationcategory(){



        $categories = Organizationcategory::all();


        if(is_null($categories)){

            $response = new Requestresponse();
            $response->code = "100";
            $response->status = "Failed";
            $response->message = "Organization Categories is empty";
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;

        }else{

            $response = new Requestresponse();
            $response->code = "200";
            $response->status = "Success";
            $response->message = "Organization Categories ";
            $response->data = $categories;


            $responseJSON = json_encode($response);


            return $responseJSON;

        }





    }

}
