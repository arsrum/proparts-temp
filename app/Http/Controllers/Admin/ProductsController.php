<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Products;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('products_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

         $products = Products::all();

        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        // abort_if(Gate::denies('contact_us_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $Products = Products::create($request->all());
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

        return view('admin.products.show', compact('Products'));
    }

    public function destroy(ContactUs $contactUs)
    {
        abort_if(Gate::denies('contact_us_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactUs->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactUsRequest $request)
    {
        ContactUs::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
