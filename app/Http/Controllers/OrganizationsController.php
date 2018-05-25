<?php

namespace App\Http\Controllers;

use App\LocalModels\Requestresponse;
use Illuminate\Http\Request;
use App\Models\Organization;
use PhpParser\Node\Stmt\TryCatch;

class OrganizationsController extends Controller
{
    public function createOrganization(Request $request){

try{
    $organization = new Organization;



    $organization->Name = $request->input('Name');
    $organization->Address = $request->input('Address');
    $organization->Email = $request->input('Email');
    $organization->Phone = $request->input('Phone');
    $organization->Type = $request->input('Type');
    $organization->OrganizationCategory_id = $request->input('OrganizationCategory_id');
    $saved =  $organization->save();



    if ($saved){


        $response = new Requestresponse();
        $response->code = "200";
        $response->status = "Success";
        $response->message = "Organization  was saved";
        $response->data = $organization;


        $responseJSON = json_encode($response);


        return $responseJSON;


    }else{


        $response = new Requestresponse();
        $response->code = "500";
        $response->status = "Failed";
        $response->message = "Organization   failed to save";
        $response->data = "null";


        $responseJSON = json_encode($response);


        return $responseJSON;

    }
}catch (\Exception $exception){

    $response = new Requestresponse();
    $response->code = "100";
    $response->status = "Failed";
    $response->message = $exception;
    $response->data = "null";


    $responseJSON = json_encode($response);


    return $responseJSON;
        }






    }


    public function updateOrganization(Request $request){

        try{

            $Organization_id = $request->input('Organization_id');
            $Name = $request->input('Name');

            if ( is_null($Organization_id)){

                $response = new Requestresponse();
                $response->code = "100";
                $response->status = "Validate errors";
                $response->message = "Organization  ID cannot be empty";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;


            }else{

                $organization = Organization::where('id',$Organization_id)->first();

                if ( is_null($organization)){

                    $response = new Requestresponse();
                    $response->code = "100";
                    $response->status = "Failed";
                    $response->message = "Organization  does not exist";
                    $response->data = "null";


                    $responseJSON = json_encode($response);


                    return $responseJSON;

                }else{


                    $organization->Name = $request->input('Name');
                    $organization->Address = $request->input('Address');
                    $organization->Email = $request->input('Email');
                    $organization->Phone = $request->input('Phone');
                    $organization->Type = $request->input('Type');
                    $organization->OrganizationCategory_id = $request->input('OrganizationCategory_id');
                    $saved =  $organization->save();

                    if ($saved){


                        $response = new Requestresponse();
                        $response->code = "200";
                        $response->status = "Success";
                        $response->message = "Organization  was saved";
                        $response->data = $organization->toJson();


                        $responseJSON = json_encode($response);


                        return $responseJSON;


                    }else{


                        $response = new Requestresponse();
                        $response->code = "500";
                        $response->status = "Failed";
                        $response->message = "Organization   failed to save";
                        $response->data = "null";


                        $responseJSON = json_encode($response);


                        return $responseJSON;

                    }

                }








            }






        }catch (\Exception $exception){
            $response = new Requestresponse();
            $response->code = "100";
            $response->status = "Failed";
            $response->message = $exception;
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;

        }








    }


    public function deleteOrganization(Request $request){

        $Name = $request->input('Name');
        $organization = Organization::where('Name',$Name)->first();



        if ( is_null($organization)){

            $response = new Requestresponse();
            $response->code = "100";
            $response->status = "Failed";
            $response->message = "Organization  does not exist";
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;

        }else {

            $deleted =  $organization->delete();


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
                $response->message = "Organization failed to delete";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;

            }

        }




    }

    public function getAllOrganization(){



        $categories = Organization::all();


        if(is_null($categories)){

            $response = new Requestresponse();
            $response->code = "100";
            $response->status = "Failed";
            $response->message = "Organization  is empty";
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;

        }else{

            $response = new Requestresponse();
            $response->code = "200";
            $response->status = "Success";
            $response->message = "Organizations ";
            $response->data = $categories;


            $responseJSON = json_encode($response);


            return $responseJSON;

        }





    }
}
