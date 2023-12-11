<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;

//use App\Http\Controllers\Customer\customerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//Admin side

Route::get("/admin/login", [authController::class, "loginAdmin"])->name('login');
Route::post("/admin/loginProcess", [authController::class, "loginProcess"]);
Route::get("/admin/logout", [authController::class, "logout"]);

Route::prefix('/admin')->middleware('admin')->group(function (){

    //product manage
    Route::get("/productList", [productController::class, "displayProduct"]);
    Route::post("/addProduct", [productController::class, "addProduct"]);
    Route::post("/saveProduct", [productController::class, "addProcess"]);
    Route::get("/editProduct/{id}", [productController::class, "editProduct"]);
    Route::post("/updateProduct/{id}", [productController::class, "updateProduct"]);
    Route::get("/deleteProduct/{id}", [productController::class, "deleteProduct"]);


    //customer manage
    Route::get("/customerList", [customerController::class, "displayCustomer"]);
    Route::post("/addCustomer", [customerController::class, "addCustomer"]);
    Route::post("/saveCustomer", [customerController::class, "addProcess"]);
    Route::get("/editCustomer/{id}", [customerController::class, "editCustomer"]);
    Route::post("/updateCustomer/{id}", [customerController::class, "updateCustomer"]);
    Route::get("/deleteCustomer/{id}", [customerController::class, "deleteCustomer"]);


    //cart manage
    Route::get("/cart", [cartController::class, "displayCart"]);
    Route::get("/add_cart/{id}", [cartController::class, "addCart"]);
    Route::get("/updateCart/{id}", [cartController::class, "updateCart"]);
    Route::get("/deleteCart/{id}", [cartController::class, "deleteCart"]);
    Route::get('/deleteAllCart', [cartController::class, 'deleteAllCart']);


    //order manage
    Route::get("/orderList", [orderController::class, "displayOrder"]);
    Route::post("/storeOrder", [orderController::class, "storeOrder"]);
    Route::get("/updateStatus/{id}", [orderController::class, "updateStatus"]);
    Route::get("/orderDetail/{id}", [orderController::class, "orderDetail"]);

});


//Customer side
Route::get("/user/login", [authController::class, "loginUser"]);
Route::get("/user/register", [authController::class, "register"]);
Route::post("/user/registerProcess", [authController::class, "registerProcess"]);


//Home
Route::get("/", [productController::class, "displayProductHome"]);


//Customer cart
Route::get("user/add_cart/{id}", [cartController::class, "addCart"]);
Route::get("user/cart", [cartController::class, 'displayCart']);
Route::get("/user/updateCart/{id}", [cartController::class, "updateCart"]);
Route::get("/user/deleteCart/{id}", [cartController::class, 'deleteCart']);
Route::get("/user/deleteAllCart", [cartController::class, "deleteAllCart"]);


//Customer order
Route::post("/user/storeOrder", [orderController::class, 'storeOrder']);
Route::get("/user/orderDetail/{id}", [orderController::class, 'orderDetail']);
Route::get("/user/order", [orderController::class, 'displayOrder']);


//Customer brand
Route::get("/user/brand1", [productController::class, 'brand1']);
Route::get("/user/brand2", [productController::class, 'brand2']);
Route::get("/user/brand3", [productController::class, 'brand3']);


//Customer product
Route::get("/user/productDetail/{id}", [productController::class, 'productDetail']);
Route::get("/user/search", [productController::class, "searchProduct"]);
