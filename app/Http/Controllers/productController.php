<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller{

    //Admin side
    public function displayProduct(Request $request){
        $search = '';
        if(isset($request->search)){
            $search = $request->search;
        }
        $products = DB::table("product")
            ->select('*')
            ->where("Product_name", "LIKE", "%$search%")
            ->paginate(5);

        return view("/Admin/products/displayProduct",[
            "products" => $products,
            "search" => $search
        ]);
    }

    public function addProduct(){
        $brands = DB::table("brand")
            ->select("*")
            ->get();
        return view("/Admin/products/createProduct",[
            "brands" => $brands
        ]);
    }

    public function addProcess(Request $request){
        $name = $request->productName;
        $price = $request->productPrice;
        $brand = $request->productBrand;
        $quantity = $request->productQuantity;
        $description = $request->productDescription;
        $image = $request->file('imageFile');
        $storeImage = $image->move('image', $image->getClientOriginalName());
        DB::table("product")
            ->insert([
                "Product_name" => $name,
                "Product_price" => $price,
                "ID_brand" => $brand,
                "Product_quantity" => $quantity,
                "Product_description" => $description,
                "Product_image" => $storeImage
            ]);
        return redirect("/admin/productList");
    }

    public function editProduct($id){
        $products = DB::table("product")
            ->join("brand", "product.ID_brand", "=", "brand.id")
            ->select("product.*", "brand.Brand_name")
            ->where("product.id","=", $id)
            ->get();
        return view("Admin/products/editProduct",[
            "products" => $products
        ]);

    }
    public function updateProduct(Request $request, $id){
        $id = $request->id;
        $name = $request->productName;
        $price = $request->productPrice;
        $brand = $request->productBrand;
        $quantity = $request->productQuantity;
        $description = $request->productDescription;
        DB::table("product")
            ->where("id", "=", $id)
            ->update([
                "Product_name" => $name,
                "Product_price" => $price,
                "ID_brand" => $brand,
                "Product_quantity" => $quantity,
                "Product_description" => $description
            ]);
        return redirect("/admin/productList");
    }

    public function deleteProduct($id){
        DB::table("product")
            ->where("id", $id)
            ->delete();
        return redirect("/admin/productList");
    }



    //Customer side
    public function displayProductHome(Request $request){
        $search = '';
        if(isset($request->search)){
            $search = $request->search;
        }
        $products1 = DB::table("product")
            ->select("*")
            ->where("Product_price", "<", 500000)
            ->orwhere("ID_brand", "=", 1)
            ->where("ID_brand", "=", 2)
            ->paginate(4);

        $products2 = DB::table("product")
            ->select("*")
            ->where("ID_brand", "=", 3)
            ->paginate(4);

        $brands = DB::table("brand")
            ->select("*")
            ->get();


        return view("Customer/home", [
            "products1" => $products1,
            "products2" => $products2,
            "brands" => $brands,
            "search" => $search
        ]);
    }

    public function brand1(){
        $products = DB::table("product")
            ->join("brand", "product.ID_brand", '=', 'brand.id')
            ->select("product.*", "brand.Brand_name")
            ->where("ID_brand",'=', 1)
            ->get();
        return view("Customer/products/productPage",[
            "products" => $products
        ]);
    }

    public function brand2(){
        $products = DB::table("product")
            ->join("brand", "product.ID_brand", '=', 'brand.id')
            ->select("product.*", "brand.Brand_name")
            ->where("ID_brand",'=', 2)
            ->get();

        return view("Customer/products/productPage",[
            "products" => $products
        ]);
    }

    public function brand3(){
        $products = DB::table("product")
            ->join("brand", "product.ID_brand", '=', 'brand.id')
            ->select("product.*", "brand.Brand_name")
            ->where("ID_brand",'=', 3)
            ->get();
        return view("Customer/products/productPage",[
            "products" => $products
        ]);
    }

    public function productDetail($id){
        $products = DB::table("product")
            ->select("*")
            ->where("product.id", '=', $id)
            ->get();
        return view("Customer/products/productDetail", compact("products"));
    }

    public function searchProduct(Request $request){
        $search = '';
        if(isset($request->search)){
            $search = $request->search;
        }
        $brands = DB::table("brand")
            ->select("Brand_name")
            ->where("Brand_name", "LIKE", "%$search%")
            ->get();
        foreach ($brands as $brand){
            $brandName = $brand->Brand_name;
        }
        $products = DB::table("product")
            ->join("brand", "product.ID_brand","=","brand.id")
            ->select("product.*",'product.id', "brand.Brand_name")
            ->where("brand.Brand_name","=",$brandName)
            ->get();
        return view("Customer/products/productPage",[
            "search" => $search,
            "products" => $products
        ]);
    }
}
