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
use Mail;
use Essam\TapPayment\Payment;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Symfony\Component\HttpFoundation\Response;
use LaravelDaily\Invoices\Classes\Party;
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
         'url' => url('/done')
      ],
      'redirect' => [
         'url' => url('/done')
      ]
  ],$redirect)];

  foreach ($data as $key => $data) {
    $asd=$data;
  }
  
    // return response()->json();
    $basic  = new \Vonage\Client\Credentials\Basic("aa6466e9", "XuTPDuGUqBq70qPC");
    $client = new \Vonage\Client($basic);
    $response = $client->sms()->send(
      new \Vonage\SMS\Message\SMS("966561773303", 'pro parts', 'تم إنشاء طلبك')
  );
  
  $message = $response->current();
  
    $to_name = "sqobti@gmail.com";
    $to_email = "sqobti@gmail.com";
    $data = array('name'=>"Ogbonna Vitalis(sender_name)", "body" => "A test mail");
    Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
    $message->to($to_email, $to_name)
    ->subject('Laravel Test Mail');
    $message->from('propartssa@gmail.com','Test Mail');
    });
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

  public function done()
  {
  
    $to_name = "sqobti@gmail.com";
    $to_email = "sqobti@gmail.com";
    $data = array('name'=>"Ogbonna Vitalis(sender_name)", "body" => "A test mail");
    Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
    $message->to($to_email, $to_name)
    ->subject('Laravel Test Mail');
    $message->from('propartssa@gmail.com','Test Mail');
    });
    
    $client = new Party([
      'name'          => 'Pro Parts',
      'phone'         => '92',
      'custom_fields' => [
          'note'        => 'IDDQD',
          'business id' => '365#GG',
      ],
  ]);

  $customer = new Party([
      'name'          => 'Ashley Medina',
      'address'       => 'The Green Street 12',
      'code'          => '#22663214',
      'custom_fields' => [
          'order number' => '> 654321 <',
      ],
  ]);

  $items = [
      (new InvoiceItem())
          ->title('Service 1')
          ->description('Your product or service description')
          ->pricePerUnit(47.79)
          ->quantity(2)
          ->discount(10),
      (new InvoiceItem())->title('Service 2')->pricePerUnit(71.96)->quantity(2),
      (new InvoiceItem())->title('Service 3')->pricePerUnit(4.56),
      (new InvoiceItem())->title('Service 4')->pricePerUnit(87.51)->quantity(7)->discount(4)->units('kg'),
      (new InvoiceItem())->title('Service 5')->pricePerUnit(71.09)->quantity(7)->discountByPercent(9),
      (new InvoiceItem())->title('Service 6')->pricePerUnit(76.32)->quantity(9),
      (new InvoiceItem())->title('Service 7')->pricePerUnit(58.18)->quantity(3)->discount(3),
      (new InvoiceItem())->title('Service 8')->pricePerUnit(42.99)->quantity(4)->discountByPercent(3),
      (new InvoiceItem())->title('Service 9')->pricePerUnit(33.24)->quantity(6)->units('m2'),
      (new InvoiceItem())->title('Service 11')->pricePerUnit(97.45)->quantity(2),
      (new InvoiceItem())->title('Service 12')->pricePerUnit(92.82),
      (new InvoiceItem())->title('Service 13')->pricePerUnit(12.98),
      (new InvoiceItem())->title('Service 14')->pricePerUnit(160)->units('hours'),
      (new InvoiceItem())->title('Service 15')->pricePerUnit(62.21)->discountByPercent(5),
      (new InvoiceItem())->title('Service 16')->pricePerUnit(2.80),
      (new InvoiceItem())->title('Service 17')->pricePerUnit(56.21),
      (new InvoiceItem())->title('Service 18')->pricePerUnit(66.81)->discountByPercent(8),
      (new InvoiceItem())->title('Service 19')->pricePerUnit(76.37),
      (new InvoiceItem())->title('Service 20')->pricePerUnit(55.80),
  ];

  $notes = [
      'your multiline',
      'additional notes',
      'in regards of delivery or something else',
  ];
  $notes = implode("<br>", $notes);

  $invoice = Invoice::make('receipt')
      ->series('BIG')
      // ability to include translated invoice status
      // in case it was paid
      ->status(__('invoices::invoice.paid'))
      ->sequence(667)
      ->serialNumberFormat('{SEQUENCE}/{SERIES}')
      ->seller($client)
      ->buyer($customer)
      ->date(now()->subWeeks(3))
      ->dateFormat('m/d/Y')
      ->payUntilDays(14)
      ->currencySymbol('$')
      ->currencyCode('USD')
      ->currencyFormat('{SYMBOL}{VALUE}')
      ->currencyThousandsSeparator('.')
      ->currencyDecimalPoint(',')
      ->filename($client->name . ' ' . $customer->name)
      ->addItems($items)
      ->notes($notes)
      ->logo(public_path('imgs/logo.png'))
      // You can additionally save generated invoice to configured disk
      ->save('public');

  $link = $invoice->url();
  // Then send email to party with link

  // And return invoice itself to browser or have a different view
  return $invoice->stream();
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
