<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizationcategory;

class OrganizationsCategoriesController extends Controller
{
    public function createOrganizationcategory(Request $request){

        $category = Organizationcategory::create($request->all());


        return $category;

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
