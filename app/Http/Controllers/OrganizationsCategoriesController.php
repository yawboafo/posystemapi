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
         $response->message = "Organization Category was failed to save";
         $response->data = "null";


         $responseJSON = json_encode($response);


         return $responseJSON;

     }




    }


    public function updateOrganizationcategory(Request $request){

        $category = Organizationcategory::updateOrCreate($request->all());


        return $category;

    }


    public function deleteOrganizationcategory($id){


        $category = Organizationcategory::find($id);
        $category->delete();


    }



    public function getAllOrganizationcategory(){



        $categories = Organizationcategory::all();


        return $categories;


    }

}
