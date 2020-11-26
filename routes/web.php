<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ImageUpload;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Attribute\AttributeController;
use App\Http\Controllers\Admin\Attribute\AttributeGroupController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Product\ProductAttributeController;
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
Route::resource('admin/product',ProductController::class);

Route::resource('admin/product_attribute',ProductAttributeController::class);

Route::resource('admin/attribute_group',AttributeGroupController::class);
Route::resource('admin/attribute',AttributeController::class);

