<?php

namespace App\Http\Controllers\Users;
use Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{

    public function myorders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('users.myorders', compact('orders'));
    }
    
    public function settings(){
        $user=User::find(Auth::id());
        return view ('users.settings',compact('user'));
    }
    

   
    public function updateUserSettings(Request $request, $id) {
        $request->validate([
            "email" => "required|max:255|email",  // Increased the max length to 255 for email
            "name" => "required|max:255",  // Increased the max length for name
        ]);
    
        $user = User::find($id);
        if ($user) {
            $user->update($request->all());

            return Redirect::route('users.settings')->with('update', 'User data updated successfully');
        } else {
            return Redirect::route('users.settings')->with('error', 'User not found');
        }
    }
    
  
    
        }
 
