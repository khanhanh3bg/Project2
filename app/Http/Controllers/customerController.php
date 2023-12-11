<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class customerController extends Controller{
    public function displayCustomer(Request $request){
        $search = '';
        if(isset($request->search)){
            $search = $request->search;
        }
        $customers = DB::table("users")
            ->select('*')
            ->where("role", '=', 1)
            ->where("name", "LIKE", "%$search%")
            ->paginate(5);

        return view("/Admin/customers/displayCustomer",[
            "customers" => $customers,
            "search" => $search
        ]);
    }

    public function addCustomer(){
        return view("Admin/customers/createCustomer");
    }

    public function addProcess(Request $request){
        $name = $request->customerName;
        $address = $request->customerAddress;
        $phone = $request->customerPhone;
        $email = $request->customerEmail;
        $pass = $request->customerPass;
        DB::table("users")
            ->insert([
                "name" => $name,
                "phone" => $phone,
                "address" => $address,
                "email" => $email,
                "password" => bcrypt($pass)
            ]);
        return redirect("/admin/customerList");
    }

    public function editCustomer($id){
        $customers = DB::table("users")
            ->select("*")
            ->where("id", $id)
            ->get();
        return view("Admin/customers/editCustomer",[
            "customers" => $customers
        ]);
    }

    public function updateCustomer(Request $request, $id){
        $name = $request->customerName;
        $address = $request->customerAddress;
        $phone = $request->customerPhone;
        $email = $request->customerEmail;
        $pass = $request->customerPass;
        DB::table("users")
            ->where("id", $id)
            ->update([
                "name" => $name,
                "address" => $address,
                "phone" => $phone,
                "email" => $email,
                "password" => bcrypt($pass)
            ]);
        return redirect("/admin/customerList");
    }

    public function deleteCustomer($id){
        DB::table("users")
            ->where("id", $id)
            ->delete();
        return redirect("/admin/customerList");
    }

    public function home(){
        return view("Customer/home");
    }
}
