<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Cart;

class CartController
{
  public function add(Request $request)
  {
    Cart::add(array(
      array(
        'id' => rand(1, 100),
        'name' => "Cam Sensor",
        'price' => "135",
        'qty' => rand(1, 5),
        'options' => array(
          'img' => $request->img,
          'supplier' => $request->dataSupplierId,
          'manufacturer' => "797",
          'articleNumber' => "106819",
        )
      )

    ));
    return redirect()->back()->with('success', 'parts added successfully');
  }
  public function buy(Request $request)
  {
    Cart::add(array(
      array(
        'id' => rand(1, 100),
        'name' => "Cam Sensor",
        'price' => "135",
        'qty' => rand(1, 5),
        'options' => array(
          'img' => $request->img,
          'supplier' => $request->dataSupplierId,
          'manufacturer' => "797",
          'articleNumber' => "106819",
        )
      )

    ));
    $cart = Cart::content();

    return view('frontend.confirm-order', compact('cart'));
  }
  public function index()
  {
    $cart = Cart::content();
    //   return response()->json($cart, 200);
    return view('frontend.confirm-order', compact('cart'));
  }

  public function cartDelete(){

    $cart= Cart::content();
    foreach ($cart as $value) {
      Cart::remove($value->rowId);

    }
    return redirect('/home');

  }

  public function remove($id)
  {
    $cart = Cart::remove($id);
   // return response()->json($cart, 200);
   return redirect()->back()->with('success', 'parts added successfully');
  }
}