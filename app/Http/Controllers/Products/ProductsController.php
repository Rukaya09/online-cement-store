<?php

namespace App\Http\Controllers\Products;
use Auth;
use Redirect;
use App\Models\product\Cart;
use Illuminate\Http\Request;
use App\Models\Product\Order;
use App\Models\Product\Product;
use App\Models\product\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function singleCategory($id)
    {
        $products= Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('products.singlecategory', compact('products'));
    }
    
    public function singleProduct($id){

        $product=Product::find($id);
        $relatedProducts = Product::where('category_id',$product->category_id)
         ->where('id', '!=', $id)
         ->get();
         if (isset(Auth::user()->id)){
            $checkInCart=Cart::where('pro_id',$id)
            ->where('user_id',Auth::user()->id)
            ->count();
            return view ('products.singleproduct',compact('product','relatedProducts','checkInCart'));

         }else{
            return view ('products.singleproduct',compact('product','relatedProducts'));

         }
     

}


 public function shop(){
    $categories = Category::select()->orderBy('id', 'desc')->get();
    $mostwanted=Product::select()->orderBy('name','desc')->take(5)->get();
    $vegetables=Product::select()->where('category_id','=',4)->orderBy('id', 'desc')->get();
    $meat=Product::select()->where('category_id','=',8)->orderBy('id', 'desc')->get();
    $fruits=Product::select()->where('category_id','=',5)->orderBy('id', 'desc')->get();
    $frozenfoods=Product::select()->where('category_id','=',1)->orderBy('id', 'desc')->get();
    $fishes=Product::select()->where('category_id','=',2)->orderBy('id', 'desc')->get();
    return view('products.shop',compact('categories','mostwanted','vegetables','meat','fruits','frozenfoods','fishes'));
}
public function addToCart(Request $request){

    $addCart=Cart::create([
        'name'=> $request->name,
        'price'=>$request->price,
        'qty'=>$request->qty,
        'image'=>$request->image,
        'pro_id'=>$request->pro_id,
        'user_id'=>Auth::user()->id,
        'subtotal'=>$request->qty * $request->price,
    ]);
    if($addCart){
        return redirect()->route("single.product",$request->pro_id)->with(['success'=>'product added successfully']);
    }
    echo"item added in cart successfully";
  
}

public function cart(){
    $cartProducts=  Cart::select()->where('user_id',Auth::user()->id)
    ->get();
    $subtotal=Cart::where('user_id',Auth::user()->id)->sum('subtotal');
    return view('products.cart',compact('cartProducts','subtotal'));
}

public function deletefromCart($id)
{
    $deleteCart = Cart::find($id);
    if (!$deleteCart) {
        return redirect()->route('products.cart')->with(['error' => 'Product not found in the cart.']);
    }
    $deleteCart->delete();
    return redirect()->route('products.cart')->with(['delete' => 'Product removed from cart successfully.']);
}



  public function prepareCheckout(Request $request){
    $price=$request->price;
    $value=Session::put('value',$price);
    $newPrice=Session::get($value);
    if($newPrice > 0){
        return redirect::route('products.checkout');
    }
    
  }
  public function checkout(){
  $cartItems=Cart::select()->where('user_id',Auth::user()->id)->get();
  $checkoutSubtotal=Cart::select()->where('user_id',Auth::user()->id)->sum('subtotal');

  return view('products.checkout',compact('cartItems','checkoutSubtotal'));
}

public function proccessCheckout(Request $request){

    $checkout=Order::create([
        'name'=> $request->name,
        'last_name'=>$request->last_name,
        'address'=>$request->address,
        'town'=>$request->town,
        'state'=>$request->state,
        'zip_code'=>$request->zip_code,
        'email'=>$request->email,
        'phone_number'=>$request->phone_number,
        'price'=>$request->price,
        'user_id'=>$request->user_id,
        'order_notes'=>$request->order_notes,

    ]);
    $value=Session::put('value',$request->price,);
    $newPrice=Session::get($value);
    if($checkout){
        return redirect()->route("products.pay");
    }
    echo"item added in cart successfully";
  
}
public function payWithPaypal(){
    return view('products.pay');
    echo"pay with paypal";

  }
  

  public function success(){
   $deleteCartItemsFromCart= Cart::where('user_id',Auth::user()->id);
   $deleteCartItemsFromCart->delete();
   if($deleteCartItemsFromCart){
    return view("products.success");
}


  }
}