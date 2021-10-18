<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Cart;

class CartController
{
  public function add(Request $request)
  {
    // return response()->json($request);

    Cart::add(array(
      array(
        'id' => rand(1, 100),
        'name' => $request->name,
        'price' => (float)$request->price,
        'qty' => rand(1, 5),
        'options' => array(
          'img' => $request->img,
          'supplier' => $request->dataSupplierId,
          'manufacturer' => $request->manufacturer,
          'carId'=>$request->carId,
          'articleNumber' =>  $request->articleNumber ,
        )
      )

    ));
    $cart = Cart::content();
    return back()->with('success','message here');
    return response()->json($request);

  }
  public function buy(Request $request)
  {      
    //  return response()->json($request);

    
    $cart = Cart::content();
    foreach ($cart as $key => $value) {
      if($value->options->articleNumber==$request->articleNumber)
      {
        $cart = Cart::content();

        return view('Frontend.confirm-order', compact('cart'));
      }

    }
     Cart::add(array(
       array(
         'id' => rand(1, 100),
         'name' => $request->name ,
         'price' => "135",
         'qty' => rand(1, 5),
         'options' => array(
          'img' => $request->img,
           'supplier' => $request->dataSupplierId,
           'manufacturer' => $request->manufacturer,
           'carId'=>$request->carId,
           'articleNumber' =>  $request->articleNumber ,
           )
       )

     ));
     
    $cart = Cart::content();

    return view('Frontend.confirm-order', compact('cart'));
  }
  public function index()
  {
    $cart = Cart::content();
    //   return response()->json($cart, 200);
    return view('Frontend.confirm-order', compact('cart'));
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
   return redirect()->back()->with('success', 'parts removed successfully');
  }
}
