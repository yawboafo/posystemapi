<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class ProductCategoryController extends Controller
{


    public function createCategory(Request $request){

        $category = Category::create($request->all());


        return "hello world";

    }


    public function updateCategory(Request $request){

        $category = Category::updateOrCreate($request->all());


        return $category;

    }


    public function deleteCategory($id){


        $category = Category::find($id);
        $category->delete();


    }



    public function getAllCategories(){



        $categories = Category::all();


        return $categories;


    }

}


