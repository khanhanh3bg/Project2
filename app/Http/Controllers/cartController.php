<?php
namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class cartController extends Controller{

    public function addCart($id){
//        session()->flush();
        $product = product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }else{
            $cart[$id] = [
                'name' => $product->Product_name,
                'price' => $product->Product_price,
                'quantity' => 1,
                'image' => $product->Product_image
            ];
        }
        session()->put('cart', $cart);
        if (Auth::user()->role == 0) {
            return redirect("/admin/productList");
        }else{
            return redirect("/");
        }
    }

    public function displayCart(){
        $carts = session()->get('cart');
        $customers = DB::table("users")
            ->select("*")
            ->where("role", "=", 1)
            ->get();
        $transports = DB::table("transport")
            ->select("*")
            ->get();
        if (Auth::user()->role == 0) {
            return view("Admin/carts/displayCart", [
                "carts" => $carts,
                "customers" => $customers,
                "transports" => $transports
            ]);
        }else{
            return view("Customer/carts/displayCart",[
                "carts" => $carts
            ]);
        }
    }

    public function updateCart(Request $request, $id){
        $carts = session()->get('cart');
        if($request->button == "1"){
            if (isset($carts[$id])){
                if ($carts[$id]['quantity'] > 1){
                    $carts[$id]['quantity']--;
                    session()->put('cart',$carts);
                }else{
                    unset($carts[$id]);
                    session()->put("cart", $carts);
                }
            }
        } else{
            if (isset($carts[$id])){
                $carts[$id]['quantity']++;
                session()->put("cart", $carts);
            }
        }
        if (Auth::user()->role == 0){
            return redirect("/admin/cart");
        }else{
            return redirect("/user/cart");
        }
    }

    public function deleteCart($id){
        $carts = session()->get('cart');
        unset($carts[$id]);
        session()->put('cart', $carts);
        if (Auth::user()->role == 0) {
            return redirect('/admin/cart');
        }else{
            return redirect('/user/cart');
        }
    }

    public function deleteAllCart(){
        session()->get('cart');
        session()->forget('cart');
        if (Auth::user()->role == 0) {
            return redirect('/admin/cart');
        }else{
            return redirect('/user/cart');
        }
    }
}
