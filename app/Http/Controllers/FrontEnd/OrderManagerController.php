<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Cart;
use Orders;
use App\Models\order_products;

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
use Redirect;
use Auth;
use Essam\TapPayment\Payment;

use Symfony\Component\HttpFoundation\Response;
class OrderManagerController
{
  public function index(Request $request)
  {
          
    if (Auth::check()) {
        $addresses = Address::get()->where('user_id',Auth::user()->id);


        return view('Frontend.shipping-details',compact('addresses'));
    } else {

        return view('Frontend.shipping-details');  
      }
    
    
  }

  public function orders()
  {

      $orders = Order::with(['user', 'address', 'status'])->get();

      $users = User::get();

      $addresses = Address::get();

      $statuses = Status::get();


      return view('Frontend.orders', compact('orders', 'users', 'addresses', 'statuses'));
  }
  public function store(Request $request)
  {
    $input=$request->all();

    if(!isset($input['address']))
    {
      $address = Address::create($input);

      $cart = Cart::content();

    $input['user_id']=Auth::user()->id;
    $order = Order::create($input);
    $saad=$order->id;
    foreach ($cart as  $value) {
        $input['brand_no']=rand(1312,99999);
        $input['generic_article']=rand(1312,99999);
        $input['article_no']=rand(1312,99999);
        $input['address_id']=$address->id;
        $input['order_id']=$saad;

        $order_products = order_products::create($input);

    }
    $TapPay = new Payment(['secret_api_Key'=> 'sk_test_8s1YyuD94WJkTwMqNUKPBb0E']);












    $redirect = false; // return response as json , you can use it form mobile web view application
    $data=[$TapPay->charge([
      'amount' => 1,
      'currency' => 'SAR',
      'threeDSecure' => 'true',
      'description' => 'test description',
      'statement_descriptor' => 'sample',
      'customer' => [
         'first_name' => 'customer',
         'email' => 'customer@gmail.com',
      ],
      'source' => [
        'id' => 'src_card'
      ],
      'post' => [
         'url' => '/done'
      ],
      'redirect' => [
         'url' => url('/done')
      ]
  ],$redirect)];

  foreach ($data as $key => $data) {
    $asd=$data;
  }
  
    // return response()->json();

    return Redirect::to($asd->transaction->url);

    }
    else
    {
      $cart = Cart::content();
      $address = Address::findOrFail($request->address);

      $input['user_id']=Auth::user()->id;
      $order = Order::create($input);
      $saad=$order->id;
      foreach ($cart as  $value) {
          $input['brand_no']=rand(1312,99999);
          $input['generic_article']=rand(1312,99999);
          $input['article_no']=rand(1312,99999);
          $input['address_id']=$address->id;
          $input['order_id']=$saad;
  
          $order_products = order_products::create($input);
      }
        return redirect()->route('done');
    }
    $cart = Cart::content();

    // 'user_id',
    //     'address_id',
    //     'status_id',
    //     'quantity',
    //     'price',
    //     'generic_article',
    //     'article_no',
    //     'brand_no',
    if(!isset($input['address']))
    {
      $input['address_id']=$address->id;
    }else
    {
      $input['address_id']=$request->address;
    }

    $input['user_id']=Auth::user()->id;
    $order = Order::create($input);
    $saad=$order->id;
    foreach ($cart as  $value) {
        $input['brand_no']=rand(1312,99999);
        $input['generic_article']=rand(1312,99999);
        $input['article_no']=rand(1312,99999);
        $input['address_id']=$address->id;
        $input['order_id']=$saad;

        $order_products = order_products::create($input);

    }
    

      return redirect()->route('done');
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
