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
use App\Models\Order;
use App\Models\User;
use App\Models\ContactUs;
use App\Models\Status;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class UserFrontendController
{
  public function index(Request $request)
  {
    
    $user = auth()->user();

    return view('Frontend.profile', compact('user'));
  }

  public function orders()
  {

      $orders = Order::with(['user', 'address', 'status'])->get();

      $users = User::get();

      $addresses = Address::get();

      $statuses = Status::get();


      return view('Frontend.orders', compact('orders', 'users', 'addresses', 'statuses'));
  }
  public function contactUs()
  {

    
      return view('Frontend.contact-us');
  }
  public function contactUsStore(Request $request)
  {
    $contactUs = ContactUs::create($request->all());
    
    return redirect()->back()->with('success', 'message sent successfully');
}

}
