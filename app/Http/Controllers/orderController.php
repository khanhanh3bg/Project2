<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class orderController extends Controller{
    public function displayOrder(){
        if (Auth::user()->role == 0) {
            $orders = DB::table("order")
                ->join("users", "order.ID_user", "=", "users.id")
                ->join("transport", "order.ID_transport", "=", "transport.id")
                ->select('order.*', 'users.address', 'users.name', 'users.phone', 'transport.Shipper_name')
                ->orderBy('id','desc')
                ->paginate(5);
            return view("/Admin/orders/displayOrder", [
                "orders" => $orders
            ]);
        }else{
            $orders = DB::table("order")
                ->join("users", "order.ID_user", "=", "users.id")
                ->join("transport", "order.ID_transport", "=", "transport.id")
                ->select('order.*', 'users.address', 'users.name', 'users.phone', 'transport.Shipper_name')
                ->where("ID_user",'=',Auth::user()->id)
                ->orderBy('id','desc')
                ->paginate(5);
            return view("/Customer/orders/orderHistory", [
                "orders" => $orders
            ]);
        }
    }

    public function storeOrder(Request $request){
        if (Auth::user()->role == 0){
            $id_user = $request->user;
            $id_transport = $request->transport;
        }else{
            $id_user = Auth::user()->id;
            $id_transport = 1;
        }
        $status = 1;
        $date = date('Y-m-d');
        $carts = session()->get('cart');
        DB::table("order")
            ->insert([
                'Order_status' => $status,
                'Order_date' => $date,
                'ID_user' => $id_user,
                "ID_transport" => $id_transport
            ]);
        $id_orders = DB::table("order")
            ->select(DB::raw(" MAX(id) as order_id"))
            ->where("ID_user", '=', $id_user)
            ->get();
        foreach ($id_orders as $each){
            $order_id = $each->order_id;
        }
        foreach ($carts as $id => $value){
            $amounts = $value["quantity"];
            $priceProduct = DB::table("product")
                ->select("Product_price")
                ->where("id", '=', $id)
                ->get();
            foreach ($priceProduct as $item){
                $price = $item->Product_price;
            }
            DB::table("order_detail")
                ->insert([
                    'Price' => $price,
                    'Quantity' => $amounts,
                    'ID_order' => $order_id,
                    'ID_product' => $id
                ]);
        }
//        $quantitys = DB::table("order_detail")
//            ->where("ID_order", $order_id)
//            ->select("Quantity")
//            ->get();
//        foreach ($quantitys as $quantity){
//            $quantityProduct = $quantity->Quantity;
//
//            $amount = DB::table("product")
//                ->where("id",$id)
//                ->select("Product_quantity")
//                ->get();
//            foreach ($amount as $each){
//                $eachAmount = $each->Product_quantity;
//                $quantityPrd = $eachAmount - $quantityProduct;
//                DB::table("product")
//                    ->where("id", $id)
//                    ->update([
//                        "Product_quantity" => $quantityPrd
//                    ]);
//            }
//        }

        session()->forget("cart");
        if (Auth::user()->role == 0) {
            return redirect("/admin/orderList");
        }else{
            return redirect("/user/orderDetail/$order_id");
        }
    }

    public function updateStatus(Request $request, $id){
        $status = $request->status;
        DB::table("order")
            ->where('id','=',$id)
            ->update([
                'Order_status' => $status
            ]);
        return redirect('/admin/orderList');
    }

    public function orderDetail($id){
        $orderDetails = DB::table("order_detail")
            ->join("product", "product.id", '=', 'order_detail.ID_product')
            ->join("order", "order.id","=","order_detail.ID_order")
            ->select("*", "product.Product_name")
            ->where("ID_order", "=", $id)
            ->paginate(5);
        if (Auth::user()->role == 1) {
            return view("Customer/orders/orderDetail", [
                "orderDetails" => $orderDetails
            ]);
        }else{
            return view("Admin/orders/orderDetail",[
                "orderDetails" => $orderDetails
            ]);
        }
    }
}
