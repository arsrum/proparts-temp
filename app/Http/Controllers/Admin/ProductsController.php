<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Products;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class ProductsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('products_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         $products = Products::all()->where('user_id',Auth::user()->id);

        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        // abort_if(Gate::denies('contact_us_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.products.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Products::create($input);
        $products = Products::all();

        return view('admin.products.index',compact('products'));

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
