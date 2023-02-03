<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceClass;
use App\Models\ServiceProduct;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceTypes = ServiceType::orderBy('id', 'ASC')
            ->get();

        return view('admin.serviceType.index', ['serviceTypes' => $serviceTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        return view('admin.serviceType.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required'
        ]);

        $serviceType = new ServiceType();
        $serviceType->title = $request->title;
        $serviceType->short_description = $request->short_description;
        $serviceType->long_description = $request->long_description;

        $serviceType->save();

        if (isset($request->service_class_title) && isset($request->service_class_description)) {
            foreach ($request->service_class_title as $key => $serviceClassTitle) {
                $serviceClass = new ServiceClass();
                $serviceClass->service_type_id = $serviceType->id;
                $serviceClass->title = $serviceClassTitle;
                $serviceClass->description = $request->service_class_description[$key];
                $serviceClass->save();

                if (isset($request->service_array_title) && isset($request->service_array_price) && isset($request->service_array_description)) {
                    foreach ($request->service_array_title[$key] as $keyService => $serviceTitle) {

                        $service = new Service();
                        $service->service_class_id = $serviceClass->id;
                        $service->title = $serviceTitle;
                        $service->price = $request->service_array_price[$key][$keyService];
                        $service->description = $request->service_array_description[$key][$keyService];

                        $service->save();

                        if (isset($request->service_products[$key])) {
                            foreach ($request->service_products[$key][$keyService] as $productId) {

                                $product = Product::find($productId);

                                if (!$product) {
                                    continue;
                                }

                                $serviceProduct = new ServiceProduct();
                                $serviceProduct->service_id = $service->id;
                                $serviceProduct->product_id = $product->id;

                                $serviceProduct->save();
                            }
                        }
                    }
                }
            }
        }

        return redirect()->route('serviceTypes.index')->with('success', 'Service Type added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceType = ServiceType::with([
            'serviceClasses' => function ($query) {
                return $query->with([
                    'services' => function ($nestedQueryOne) {
                        return $nestedQueryOne->with([
                            'serviceProducts' => function ($nestedQueryTwo) {
                                return $nestedQueryTwo->with('product');
                            }
                        ]);
                    }
                ]);
            }
        ])
            ->find($id);

        return view('admin.serviceType.edit', ['serviceType' => $serviceType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required'
        ]);

        $serviceType = ServiceType::find($id);
        $serviceType->title = $request->title;
        $serviceType->short_description = $request->short_description;
        $serviceType->long_description = $request->long_description;

        $serviceType->save();

        $serivceClassIds = $this->deleteServiceClass($id);
        $this->deleteService($serivceClassIds);

        if (isset($request->service_class_title) && isset($request->service_class_description)) {
            foreach ($request->service_class_title as $key => $serviceClassTitle) {
                $serviceClass = new ServiceClass();
                $serviceClass->service_type_id = $serviceType->id;
                $serviceClass->title = $serviceClassTitle;
                $serviceClass->description = $request->service_class_description[$key];
                $serviceClass->save();

                if (isset($request->service_array_title) && isset($request->service_array_price) && isset($request->service_array_description)) {
                    foreach ($request->service_array_title[$key] as $keyService => $serviceTitle) {
                        $service = new Service();
                        $service->service_class_id = $serviceClass->id;
                        $service->title = $serviceTitle;
                        $service->price = $request->service_array_price[$key][$keyService];
                        $service->description = $request->service_array_description[$key][$keyService];

                        $service->save();
                    }
                }
            }
        }

        return redirect()->route('serviceTypes.index')->with('success', 'Service Type added');
    }

    private function deleteServiceClass($service_type_id)
    {
        $serviceClasses = ServiceClass::where('service_type_id', $service_type_id)
            ->get();

        $serivceClassIds = [];
        foreach ($serviceClasses as $serviceClass) {
            $serivceClassIds[] = $serviceClass->id;

            $serviceClass->delete();
        }

        return $serivceClassIds;
    }

    private function deleteService($serivceClassIds)
    {
        Service::whereIn('service_class_id', $serivceClassIds)
            ->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceType::where('id', $id)->delete();
        return redirect()->route('serviceTypes.index')->with('error', 'Service Type deleted.');
    }
}
