<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('welcome');
});


Route::post('category/create',['uses' => 'ProductCategoryController@createCategory']);
Route::get('getallCategories',['uses' => 'ProductCategoryController@getAllCategories']);


Route::post('organization/create',['uses' => 'OrganizationsController@createOrganization']);


Route::post('organizationCategory/create',['uses' => 'OrganizationsCategoriesController@createOrganizationcategory']);
Route::post('organizationCategory/update',['uses' => 'OrganizationsCategoriesController@updateOrganizationcategory']);