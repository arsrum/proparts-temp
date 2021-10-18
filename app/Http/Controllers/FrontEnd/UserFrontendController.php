<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Cart;
use Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Address;
use App\Models\order_products;

use App\Models\Order;
use App\Models\User;
use App\Models\ContactUs;
use App\Models\Status;
use Gate;
use Auth;
use Symfony\Component\HttpFoundation\Response;
class UserFrontendController
{
  public function index(Request $request)
  {
    
    $user = auth()->user();
    $orders = Order::get()->where('user_id',Auth::user()->id);

    return view('Frontend.profile', compact('user','orders'));
  }

  public function orders()
  {

      $orders = Order::get()->where('user_id',Auth::user()->id);

        // return response()->json($orders);
      $users = User::get();

      $addresses = Address::get();

      $statuses = Status::get();


      return view('Frontend.orders', compact('orders', 'users', 'addresses', 'statuses'));
  }
  public function ordersshow($id)
  {

      $orders = order_products::get()->where('order_id',$id);
        //  return response()->json($orders);
        $orderDetails= Order::findOrFail($id);



      $statuses = Status::get();


      return view('Frontend.ordersShow', compact('orders', 'orderDetails'));
  }
  public function contactUs()
  {

    
      return view('Frontend.contact-us');
  }
  public function loginShow()
  {

    
      return view('Frontend.login');
  }
  public function logout () {
    //logout user
    auth()->logout();
    // redirect to homepage
    return redirect('/');
}
  public function contactUsStore(Request $request)
  {
    $contactUs = ContactUs::create($request->all());
    
    return redirect()->back()->with('success', 'message sent successfully');
}

}
