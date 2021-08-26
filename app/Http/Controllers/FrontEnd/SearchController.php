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
    $Products=Products::all();
    // return response()->json($Products);

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
         if($request->vin===null){
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
                "articleCountry": "SA",
                "childNodes": false,
                "lang": "EN",
                "linked": true,
                "linkingTargetType": "P",
                "linkingTargetId": '.$request->typeId.',
                "provider": 22735
              }
            
            }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));
          $articles = curl_exec($curl);
          
          $nodes = json_decode($articles);
          
          curl_close($curl);
          if($nodes->data==""){
           $parts=false;
          $carId=$request->typeId;
          //get vehicle details
          $carDetailsCurl = curl_init();
          curl_setopt_array($carDetailsCurl, array(
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
                "articleCountry": "SA",
                "carIds": {
                  "array": [
                    '.$carId.'
                  ]
                },
                "countriesCarSelection": "SA",
                "country": "SA",
                "lang": "en",
                "provider": 22735
            
            }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));
          $response = curl_exec($carDetailsCurl);
          
          $decodedResponse = json_decode($response);
          
          curl_close($carDetailsCurl);

          foreach($decodedResponse->data as $carValue){
            foreach ($carValue as $carData) {
                $tecDocCarId=$carData->vehicleDocId;
                $vehicleDetails[]=$carData->vehicleDetails;
                // return response()->json($vehicleDetails);

            }
          }
          //end of vehicle details 

          return view('Frontend.main-parts',compact('parts','carId','tecDocCarId','vehicleDetails'));
    
          }
          foreach($nodes->data as $value){
            foreach ($value as $data) {
                $parts[]=$data;
              
            }
          }
          //end of get vehicle by Vin 

          $carId=$request->typeId;
          //get vehicle details
          $carDetailsCurl = curl_init();
          curl_setopt_array($carDetailsCurl, array(
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
                "articleCountry": "SA",
                "carIds": {
                  "array": [
                    '.$carId.'
                  ]
                },
                "countriesCarSelection": "SA",
                "country": "SA",
                "lang": "en",
                "provider": 22735
            
            }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));
          $response = curl_exec($carDetailsCurl);
          
          $decodedResponse = json_decode($response);
          
          curl_close($carDetailsCurl);

          foreach($decodedResponse->data as $carValue){
            foreach ($carValue as $carData) {
                $tecDocCarId=$carData->vehicleDocId;
                $vehicleDetails[]=$carData->vehicleDetails;
                // return response()->json($vehicleDetails);

            }
          }
          //end of vehicle details 

          return view('Frontend.main-parts',compact('parts','carId','tecDocCarId','vehicleDetails'));
    
         }
         else
         //start of get vehicle by vin number 
        $curl = curl_init();
        //parse vin number
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
      // return response()->json($part);


      //end of identifying the car 

      // get parts of the vehicle 

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
            "linkingTargetId": '.$part.',
            "provider": 22735
          }
        }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json'
        ),
      ));
      $carId=$part;
      $articles = curl_exec($curlParts);
      
      $curls = json_decode($articles);
      
      curl_close($curlParts);
      
      foreach($curls->data as $value){
        foreach ($value as $data) {
            $parts[]=$data;
          
        }
      }
      //end of vehicle parts

      //start of getting vehicle details 
//      $carId=$request->typeId;

          //get vehicle details
          $carDetailsCurl = curl_init();
          curl_setopt_array($carDetailsCurl, array(
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
                "articleCountry": "SA",
                "carIds": {
                  "array": [
                    '.$carId.'
                  ]
                },
                "countriesCarSelection": "SA",
                "country": "SA",
                "lang": "en",
                "provider": 22735
            
            }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));
          $response = curl_exec($carDetailsCurl);
          
          $decodedResponse = json_decode($response);
          // return response()->json($decodedResponse);

          curl_close($carDetailsCurl);

          foreach($decodedResponse->data as $carValue){
            foreach ($carValue as $carData) {
                $tecDocCarId=$carData->vehicleDocId;
                $vehicleDetails[]=$carData->vehicleDetails;

            }
          }
          return view('Frontend.main-parts',compact('parts','carId','word','tecDocCarId','vehicleDetails'));

      }

      public function AssemblyGroups(Request $request){
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
            "articleCountry": "SA",
            "childNodes": false,
            "lang": "EN",
            "linked": true,
            "linkingTargetType": "P",
            "linkingTargetId": '.$request->typeId.',
            "provider": 22735
          }
        
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
            "getVehicleByIds3": {
              "articleCountry": "SA",
              "carIds": {
                "array": [
                  '.$carId.'
                ]
              },
              "countriesCarSelection": "SA",
              "country": "SA",
              "lang": "EN"
            }
          }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        $carInfo = curl_exec($curl);


        curl_close($curl);
        $object = json_decode($response);
        $objectCar = json_decode($carInfo);
        foreach ($objectCar->data->array as $key => $value) {
          $dataCar[]=$value;
          foreach ($dataCar as $key => $car) {
            $cardata[]=$car;

          }
        }
        $carDetails=$cardata[0]->vehicleDetails;
        foreach ($object->articles as $key => $value) {
          $data[]=$value;
          
        }
        //  return response()->json($carDetails, 200);
        return view('Frontend.item-details',compact('data','assemblyGroupNodeId','id','carId','carDetails'));

      }
      public  function images($id) {
         $profile_picture_url =  "https://webservice.tecalliance.services/pegasus-3-0/documents/22735/$id/0?api_key=2BeBXg6FhwzMLAc1D65AAMKnYE2E43EzPg9bu8ZY4P2Y5MWfNRMn";
        $filename = 'temp-image.jpg';
        $tempImage = tempnam(sys_get_temp_dir(), $filename);
        copy($profile_picture_url, $tempImage);
        return response()->file($tempImage);
      }
}
