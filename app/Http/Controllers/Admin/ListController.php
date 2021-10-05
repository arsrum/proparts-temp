<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\customList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class ListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('products_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         $customList = customList::all();

        return view('admin.list.index',compact('customList'));
    }

    public function create()
    {
        // abort_if(Gate::denies('contact_us_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        return view('admin.list.create',compact('data'));
    }
    public function store(Request $request)
    {
        $result_explode = explode('|', $request->manuId);

        $input = $request->all();
        $input['manuName']=$result_explode[1];
        $input['manuId']=$result_explode[0];
        //  return response()->json($input);

        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }
    
        customList::create($input);
        $customList = customList::all();

        return view('admin.list.index',compact('customList'));

    }

   

    public function edit($id)
    {
        // abort_if(Gate::denies('contact_us_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $Products = Products::findOrFail($id);

        return view('admin.products.edit',compact('Products'));
    }

    public function update(Request $request, $id)
    {
        $Products = Products::findOrFail($id);

        $Products->update($request->all());
        $products = Products::all();
        return view('admin.products.index',compact('products'));
    }

    public function show($id)
    {
        // abort_if(Gate::denies('contact_us_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $Products = Products::findOrFail($id);
        // return response()->json($Products);
        return view('Frontend.product-details', compact('Products'));
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('products_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $Products = Products::findOrFail($id);

        $Products->delete();

        return back();
    }

}