<?php

namespace App\Http\Controllers\Admins;
use Redirect;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Models\Product\Order;
use App\Models\Product\Product;
use App\Models\product\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
class AdminsController extends Controller
{
    //
    
    public function viewlogin(){
        return view('admins.login');
    }
     public function checklogin(Request $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);    
     }

     public function index(){
        $ProductsCount=Product::select()->count();
        $orderscount=Order::select()->count();
        $categories=Category::select()->count();
        $admin=Admin::select()->count();

        return view('admins.index',compact('ProductsCount','orderscount','categories','admin'));
    }
    public function displayAdmins() {
        $allAdmins = Admin::all(); 
       return view('admins.alladmins', compact('allAdmins'));
    }
    public function  createAdmins() {
        return view('admins.createadmins');

    }
    
    public function  storeAdmins(Request $request) {
        $storeAdmins=Admin::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
        ]);
       
        if($storeAdmins){
            return Redirect::route("admins.all")->with(["success"=>"admin stored successfully"]);
        }

    }
   
   public function displaycategories(){
    $allcategories = Category::select()->orderBy('id', 'asc')->get();

    return  view('admins.allcategories',compact('allcategories'));
   }
    
   public function  createcategories() {
    return view('admins.createcategories');

}
    
public function  storecategories(Request $request) {
    $destinationPath = 'assets/img/';
    $myimage = $request->image->getClientOriginalName();
    $request->image->move(public_path($destinationPath), $myimage);
    $storecategories=Category::create([
        "name"=>$request->name,
        "icon"=>$request->icon,
        "image"=>$myimage,
    ]);
   
    if($storecategories){
        return Redirect::route("categories.all")->with(["success"=>"category stored successfully"]);
    }

}
public function  editcategories($id) {
    $category=Category::find($id);
    return view('admins.editcategories',compact('category'));

}

public function  updatecategories(Request $request,$id) {
    $category=Category::find($id);
 
    $category->update($request->all());
    if($category){
        return Redirect::route("categories.all")->with(["update"=>"category updated successfully"]);
    }

}

public function  deletecategories($id) {
    $category=Category::find($id);
    if(File::exists(public_path('assets/img/' . $category->image))){
        File::delete(public_path('assets/img/' . $category->image));
    }else{
    }
    $category->delete();
    if($category){
        return Redirect::route("categories.all")->with(["delete"=>"category deleted successfully"]);
    }

}
//products

 public function displayproducts(){
   $allproducts = Product::select()->orderBy('id', 'asc')->get();
   return  view('admins.allproducts',compact('allproducts'));
}

   public function createproducts(){
    $allcategories = Category::all();
    return  view('admins.createproducts',compact('allcategories'));
   }
   

        
public function  storeproducts(Request $request) {
    $destinationPath = 'assets/img/';
    $myimage = $request->image->getClientOriginalName();
    $request->image->move(public_path($destinationPath), $myimage);
    $storeproducts=Product::create([
        "name"=>$request->name,
        "price"=>$request->price,
        "description"=>$request->description,
        "category_id"=>$request->category_id,
        "exp_date"=>$request->exp_date,
        "image"=>$myimage,
    ]);
   
    if($storeproducts){
        return Redirect::route("products.all")->with(["success"=>"products stored successfully"]);
    }

}
public function  deleteproducts($id) {
    $products=Product::find($id);
    if(File::exists(public_path('assets/img/' . $products->image))){
        File::delete(public_path('assets/img/' . $products->image));
    }else{
    }
    $products->delete();
    if($products){
        return Redirect::route("products.all")->with(["delete"=>"products deleted successfully"]);
    }

}
//orders
public function allorders(){
    $allorders = Order::select()->orderBy('id', 'asc')->get();
    return  view('admins.allorders',compact('allorders'));
 }
 public function  editorders($id) {
    $order=Order::find($id);
    return view('admins.editorders',compact('order'));

}
public function  updateorders(Request $request,$id) {
    $order=Order::find($id);
 
    $order->update($request->all());
    if($order){
        return Redirect::route("orders.all")->with(["update"=>"category updated successfully"]);
    }

}
}
