<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCarRequest;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('car_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cars = Car::all();

        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        abort_if(Gate::denies('car_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cars.create');
    }

    public function store(StoreCarRequest $request)
    {
        if($request->modelId!=null){

        
            $result_explode = explode('|', $request->modelId);
            $input['brand']=$result_explode[0];
            $input['model']=$result_explode[1];
            $input['products_id']=$request->product_id;
  
            $car = Car::create($input);
          }

        return redirect()->back();
    }

    public function edit(Car $car)
    {
        abort_if(Gate::denies('car_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cars.edit', compact('car'));
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->all());

        return redirect()->route('admin.cars.index');
    }

    public function show(Car $car)
    {
        abort_if(Gate::denies('car_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cars.show', compact('car'));
    }

    public function destroy(Car $car)
    {
        abort_if(Gate::denies('car_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarRequest $request)
    {
        Car::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
