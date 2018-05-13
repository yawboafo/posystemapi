<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
class OrganizationsController extends Controller
{
    public function createOrganization(Request $request){

        $category = Organization::create($request->all());


        return $category;

    }


    public function updateOrganization(Request $request){

        $category = Organization::updateOrCreate($request->all());


        return $category;

    }


    public function deleteOrganization($id){


        $category = Organization::find($id);
        $category->delete();


    }



    public function getAllOrganization(){



        $categories = Organization::all();


        return $categories;


    }
}
