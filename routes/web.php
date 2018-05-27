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


//User

Route::post('user/create',['uses' => 'UsersController@createUser']);
Route::post('user/update',['uses' => 'UsersController@updateUser']);
Route::post('user/delete', ['uses' => 'UsersController@deleteUser']);
Route::get('getAllUsers',['uses' => 'UsersController@getAllUsers']);
Route::post('getAllOrganizationUsers',['uses' => 'UsersController@getAllOrganizationBasedUsers']);

//PRODUCT

Route::post('product/create',['uses' => 'ProductController@createProduct']);
Route::post('product/update',['uses' => 'ProductController@updateProduct']);
Route::post('product/delete', ['uses' => 'ProductController@deleteProduct']);
Route::get('getAllProducts',['uses' => 'ProductController@getAllProducts']);
Route::post('product/get',['uses' => 'ProductController@getProduct']);

//PRODUCT CATEGORY

Route::post('category/create',['uses' => 'ProductCategoryController@createCategory']);
Route::post('category/update',['uses' => 'ProductCategoryController@updateCategory']);
Route::post('category/delete', ['uses' => 'ProductCategoryController@deleteCategory']);
Route::get('getAllCategories',['uses' => 'ProductCategoryController@getAllCategories']);
Route::post('category/get',['uses' => 'ProductCategoryController@getCategory']);
//getCategoryByID


//ORGANIZATIONS

Route::post('organization/create',['uses' => 'OrganizationsController@createOrganization']);
Route::post('organization/update',['uses' => 'OrganizationsController@updateOrganization']);
Route::post('organization/delete', ['uses' => 'OrganizationsController@deleteOrganization']);
Route::get('organizations', ['uses' => 'OrganizationsController@getAllOrganization']);


//ORGANIZATION CATEGORY

Route::post('organizationCategory/create',['uses' => 'OrganizationsCategoriesController@createOrganizationcategory']);
Route::post('organizationCategory/update',['uses' => 'OrganizationsCategoriesController@updateOrganizationcategory']);
Route::post('organizationCategory/delete', ['uses' => 'OrganizationsCategoriesController@deleteOrganizationcategory']);
Route::get('organizationCategories', ['uses' => 'OrganizationsCategoriesController@getAllOrganizationcategory']);