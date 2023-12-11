<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class authController extends Controller
{

    public function loginAdmin(){
        return view("/Admin/admins/login");
    }

    public function loginUser(){
        return view("/Customer/customers/login");
    }
    public function loginProcess(Request $request ){
        $credentials = $request->only('email', 'password');
        $check = Auth::attempt($credentials);
        if ($check){
            if (Auth::user()->role == 0){
                return redirect('/admin/orderList');
            }else{
                return redirect("/");
            }
        }else{
            return redirect('/user/login');
        }

    }

    public function register(){
        return view("/Customer/customers/register");
    }

    public function registerProcess(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        DB::table("users")
            ->insert([
                "name" => $name,
                "address" => $address,
                "phone" =>$phone,
                "email" =>$email,
                "password" => bcrypt($password)
            ]);
        return redirect("/admin/login");
    }

    public function logout(){
        Auth::logout();
        return redirect("/admin/login");
    }
}
