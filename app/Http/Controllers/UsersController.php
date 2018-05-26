<?php

namespace App\Http\Controllers;

use App\LocalModels\Requestresponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Utilities\Utility;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function createUser(Request $request){



        try{



            $variable =  $request->file('Image');

            if ( empty ( $variable ) ){

                $imageUrl = "";

            }else{

                $imageUrl = Utility::uploadImage($request,'Image');
            }



            $user = new User;

            $user->Name = $request->input('Name');
            $user->Dob = $request->input('Dob');
            $user->Gender = $request->input('Gender');
            $user->Username = $request->input('UserName');
            $user->Password = $request->input('Password');
            $user->Email = $request->input('Email');
            $user->Phone = $request->input('Phone');
            $user->Address = $request->input('Address');
            $user->RoleType = $request->input('RoleType');
            $user->ProfileUrl = $imageUrl;
            $user->LastSignIn = $request->input('LastSignIn');
            $user->Token = $request->input('Token');
            $user->organization_id = $request->input('organization_id');
            $saved =  $user->save();



            if ($saved){


                $response = new Requestresponse();
                $response->code = "200";
                $response->status = "Success";
                $response->message = "User was saved";
                $response->data = $user;


                $responseJSON = json_encode($response);


                return $responseJSON;


            }else{


                $response = new Requestresponse();
                $response->code = "500";
                $response->status = "Failed";
                $response->message = "User failed to save";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;

            }


            //  }


        }catch (\Exception $exception){

            $response = new Requestresponse();
            $response->code = "500";
            $response->status = "Failed with exception";
            $response->message = $exception + "";
            $response->data = "null";


            $responseJSON = json_encode($response);

            return $responseJSON;

        }











    }


    public function updateUser(Request $request){

        $id = $request->input('id');


        try{


            if ( is_null($id)){

                $response = new Requestresponse();
                $response->code = "100";
                $response->status = "Validate errors";
                $response->message = "User ID cannot be empty";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;


            }else{

                $user = User::where('id',$id)->first();

                if ( is_null($user)){

                    $response = new Requestresponse();
                    $response->code = "100";
                    $response->status = "Failed";
                    $response->message = "User  does not exist";
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



                    $user = new User;

                    $user->Name = $request->input('Name');
                    $user->Dob = $request->input('Dob');
                    $user->Gender = $request->input('Gender');
                    $user->Username = $request->input('UserName');
                    $user->Password = $request->input('Password');
                    $user->Email = $request->input('Email');
                    $user->Phone = $request->input('Phone');
                    $user->Address = $request->input('Address');
                    $user->RoleType = $request->input('RoleType');
                    $user->ProfileUrl = $imageUrl;
                    $user->LastSignIn = $request->input('LastSignIn');
                    $user->Token = $request->input('Token');
                    $user->organization_id = $request->input('organization_id');
                    //$saved =  $user->save();



                    $saved =   User::where('id', '=', $id)->update($user->toArray());
                    //   $saved =  $category->update($category->toArray());


                    if ($saved){


                        $response = new Requestresponse();
                        $response->code = "200";
                        $response->status = "Success";
                        $response->message = "User  was updated";
                        $response->data = $user->toJson();


                        $responseJSON = json_encode($response);


                        return $responseJSON;


                    }else{


                        $response = new Requestresponse();
                        $response->code = "500";
                        $response->status = "Failed";
                        $response->message = "User failed to save";
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

            return  $responseJSON;


        }












    }


    public function deleteUser(Request $request){

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

    public function getAllUsers(){



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


    public function getAllOrganizationBasedUsers(Request $request){

        $organizationID = $request->input('organization_id');

        if ( is_null($organizationID)) {

            $response = new Requestresponse();
            $response->code = "100";
            $response->status = "Validate errors";
            $response->message = "User Organization ID cannot be empty";
            $response->data = "null";


            $responseJSON = json_encode($response);


            return $responseJSON;
        }else{

            $users = User::where('organization_id', $organizationID)->get();


            if(is_null($users)){

                $response = new Requestresponse();
                $response->code = "100";
                $response->status = "Failed";
                $response->message = "Users  is empty";
                $response->data = "null";


                $responseJSON = json_encode($response);


                return $responseJSON;

            }else{

                $response = new Requestresponse();
                $response->code = "200";
                $response->status = "Success";
                $response->message = "Users ";
                $response->data = $users;


                $responseJSON = json_encode($response);


                return $responseJSON;

            }


        }







    }
}
