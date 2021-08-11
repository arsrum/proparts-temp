<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;

class SearchController 
{
    public function Manufactures(){
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
        $data[]=$value;
      }
    }
    // return response()->json($data);
    $Products=Products::all();
        return view('Frontend.index',compact('data','Products'));
      }

      public function model(Request $request)
      {
    
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
          "manuId": '.$request->manufactureId.',
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
        $models[]=$value;
      }
    }
    
        return response()->json($models);
      }
      

      public function type(Request $request)
      {
        $result_explode = explode('|', $request->manufactureId);

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
        "getVehicleIdsByCriteria": {
          "countriesCarSelection": "SA",
          "lang": "EN",
          "carType": "P",
          "manuId": '.$result_explode[1].',
          "modId": '.$result_explode[0].',
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
        $models[]=$value;
      }
    }
    
        return response()->json($models);
      }
      



       public function getVehicleByVin(Request $request){
        $curl = curl_init();
        $vin = trim(json_encode($request->vin),"''");

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
          "getVehiclesByVIN": {
            "country": "SA",
            "lang": "EN",
            "vin": '.$vin.',
            "provider": 22735,
            "maxVehiclesToReturn": 100
          }
        }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json'
        ),
      ));
      $articles = curl_exec($curl);
      
      $nodes = json_decode($articles);
      // return response()->json($nodes);

      curl_close($curl);
      
      foreach($nodes->data as $value){
              $daaf[]=$value;
      }
      foreach ($daaf[2] as  $saad) {
      foreach ($saad as  $help) {
        $weeb[]=$help;
        foreach ($weeb as  $word) {
          $part[]=$word;
          }
        }
      }


      $curlParts = curl_init();
      curl_setopt_array($curlParts, array(
        CURLOPT_URL => 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.jsonEndpoint?api_key=2BeBXg6FhwzMLAc1D65AAMKnYE2E43EzPg9bu8ZY4P2Y5MWfNRMn',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
          "getChildNodesAllLinkingTarget2": {
            "articleCountry": "SA",
            "childNodes": false,
            "lang": "EN",
            "linked": true,
            "linkingTargetType": "P",
            "linkingTargetId": '.$word->carId.',
            "provider": 22735
          }
        }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json'
        ),
      ));
      $carId=$word->carId;
      $articles = curl_exec($curlParts);
      
      $curls = json_decode($articles);
      
      curl_close($curlParts);
      
      foreach($curls->data as $value){
        foreach ($value as $data) {
            $parts[]=$data;
          
        }
      }
      // return response()->json($parts);
      return view('Frontend.main-parts',compact('parts','carId'));

      }

      public function AssemblyGroups(Request $request){
      // return response()->json($request);
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

          "getChildNodesAllLinkingTarget2": {

            "articleCountry": "ar",
        
            "lang": "en",
        
            "linkingTargetType": "P",
        
            "provider": 22735
        
        }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json'
        ),
      ));
      $articles = curl_exec($curl);
      
      $nodes = json_decode($articles);
      
      curl_close($curl);
      
      foreach($nodes->data as $value){
        foreach ($value as $data) {
            $parts[]=$data;
          
        }
      }
      $carId=$request->typeId;
      return view('Frontend.main-parts',compact('parts','carId'));

      }

      public function Articles($assemblyGroupNodeId,$carId){
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
              "articleCountry": "SA",
              "provider": 22735,
              "assemblyGroupNodeIds": '.$assemblyGroupNodeId.',
              "linkageTargetId": '.$carId.',
              "linkageTargetType": "P",
              "linkageTargetCountry": "SA",
              "lang": "EN",
              "perPage": 100,
              "page": 1,
              "includeGenericArticles": true,
              "includeImages": true,
              "assemblyGroupFacetOptions": {
                "enabled": true,
                "assemblyGroupType": "P"
              }
          }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $object = json_decode($response);
        foreach ($object->articles as $key => $value) {
          $data[]=$value;
          
        }
          // return response()->json($data);
        return view('Frontend.sub-parts',compact('data','assemblyGroupNodeId','carId'));

      }


      public function SingleArticles($assemblyGroupNodeId,$id,$carId){
      //  return response()->json($id);
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
              "articleCountry": "SA",
              "provider": 22735,
              "genericArticleIds": '.$id.',
              "assemblyGroupNodeIds": '.$assemblyGroupNodeId.',
              "linkageTargetId": '.$carId.',
              "linkageTargetType": "P",
              "linkageTargetCountry": "SA",
              "perPage": 1,
              "includeGenericArticles": true,
              "includeImages": true
            }
          }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $object = json_decode($response);
        foreach ($object->articles as $key => $value) {
          $data[]=$value;
          
        }
        return view('Frontend.item-details',compact('data','assemblyGroupNodeId','id','carId'));

      }
}
