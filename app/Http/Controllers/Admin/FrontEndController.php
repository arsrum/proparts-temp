<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Address;
use App\Models\Order;
use App\Models\Status;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Redirect;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class FrontEndController extends Controller
{
  public function products(){
    $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.jsonEndpoint?api_key=2BeBXg6FhwzMLAc1D65AAMKnYE2E43EzPg9bu8ZY4P2Y5MWfNRMn',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "getArticles": {
      "articleCountry": "sa",
      "provider": 22735,
      "linkageTargetId": 129452,
      "linkageTargetType": "p",
      "linkageTargetCountry": "sa",
      "lang": "en",
      "perPage": 100,
      "page": 1,
      "includeGenericArticleFacets": true
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
$object = json_decode($response);
// return response()->json($object->genericArticleFacets->counts);
foreach($object->genericArticleFacets->counts as $articleDetails){
  $data[]=$articleDetails->genericArticleDescription;
}

    return view('products',compact('data'));
  }
  
  public function home(){
//get manufactures
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.jsonEndpoint?api_key=2BeBXg6FhwzMLAc1D65AAMKnYE2E43EzPg9bu8ZY4P2Y5MWfNRMn',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "getManufacturers2": {
        "country": "sa",
        "lang": "en",
        "linkingTargetType": "p",
        "provider": 22735
      }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
$object = json_decode($response);
foreach($object->data as $articleDetails){
  foreach ($articleDetails as $value) {
    $data[]=$value->manuName;
  }
}

//get models

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.jsonEndpoint?api_key=2BeBXg6FhwzMLAc1D65AAMKnYE2E43EzPg9bu8ZY4P2Y5MWfNRMn',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "getModelSeries2": {
      "country": "SA",
      "lang": "en",
      "linkingTargetType": "p",
      "manuId": 111,
      "provider": 22735
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
$object = json_decode($response);
foreach($object->data as $articleDetails){
  foreach ($articleDetails as $value) {
    $models[]=$value->modelname;
  }
}


//get vehicle details
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.jsonEndpoint?api_key=2BeBXg6FhwzMLAc1D65AAMKnYE2E43EzPg9bu8ZY4P2Y5MWfNRMn',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "getVehicleByIds4": {
      "articleCountry": "sa",
      "carIds": {
        "array": [
          7950
        ]
      },
      "countriesCarSelection": "SA",
      "country": "SA",
      "lang": "en",
      "provider": 22735
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
$object = json_decode($response);
foreach($object->data as $articleDetails){
    //return response()->json($articleDetails[0]->vehicleDetails->yearOfConstrTo - $articleDetails[0]->vehicleDetails->yearOfConstrFrom);
}
    return view('welcome',compact('data','models'));
  }

    public function get_manu(){

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.jsonEndpoint?api_key=2BeBXg6FhwzMLAc1D65AAMKnYE2E43EzPg9bu8ZY4P2Y5MWfNRMn',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "getManufacturers2": {
        "country": "sa",
        "lang": "en",
        "linkingTargetType": "p",
        "provider": 22735
      }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

return view('admin.addresses.saad', compact('response'));
}




public function get_model(  $id){
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.jsonEndpoint?api_key=2BeBXg6FhwzMLAc1D65AAMKnYE2E43EzPg9bu8ZY4P2Y5MWfNRMn',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
      "getModelSeries": {
        "country": "SA",
        "lang": "EN",
        "linkingTargetType": "P",
        "manuId": '.$id.',
        "provider": 22735
      }
  }',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
  ));
  
  $response = curl_exec($curl);
  
  curl_close($curl);
  //echo $response;
  $object = json_decode($response);

  foreach($object->data as $articleDetails){
  
    foreach ($articleDetails as $value) {
      $data[]=$value;

    }
  }
// foreach($response as $number => $number_array)
// {
// foreach($number_array as $data => $user_data)
//     {
//       return response()->json([$number, $data , $user_data]);
//     }
// }


//return view('admin.addresses.saad', compact('response'));
  }


public function get_generic_parts($id){
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.jsonEndpoint?api_key=2BeBXg6FhwzMLAc1D65AAMKnYE2E43EzPg9bu8ZY4P2Y5MWfNRMn',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
      "getArticles": {
        "articleCountry": "sa",
        "provider": 22735,
        "linkageTargetId": 129452,
        "linkageTargetType": "p",
        "linkageTargetCountry": "sa",
        "lang": "en",
        "perPage": 100,
        "page": 1,
        "includeGenericArticles": true,
        "includeGenericArticleFacets": true
      }
  }',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json'
    ),
  ));
  
  $response = curl_exec($curl);
  
  curl_close($curl);
  echo $response;
  
  //return view('admin.addresses.saad', compact('response'));
  }

}