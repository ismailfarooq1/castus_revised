<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }

    public function termsOfService()
    {
        return view('termsOfService');
    }

    public function carpetCleaning()
    {
        return view('carpetCleaning');
    }

    public function teppahreinsun()
    {
        return view('teppahreinsun');
    }

    public function deepCleaning()
    {
        return view('deepCleaning');
    }

    public function machineRental()
    {
        $products = Product::where('is_rental', true)
            ->with('productPictures')
            ->get();

        return view('machineRental', ['products' => $products]);
    }

    public function singleMachine($id)
    {
        $product = Product::with('productPictures')
            ->find($id);

        return view('singleMachine', ['product' => $product]);
    }

    public function bookService()
    {
        $serviceTypes = ServiceType::with([
            'serviceClasses' => function ($query) {
                return $query->with([
                    'services' => function ($queryNested) {
                            return $queryNested->with([
                                'serviceProducts' => function ($queryNested2) {
                                                return $queryNested2->with('product');
                            }]);
            }]);
        }])
        ->get();

        return view('bookService', ['serviceTypes' => $serviceTypes]);
    }

    public function selectCalender(Request $request)
    {
        dd($request->all());

        $request->validate([
            'service_type' => 'required',
            'service_class' => 'required',
            'service' => 'required',
        ]);

        $service = Service::where('id', $request->service)
            ->with('serviceProducts')
            ->first();
        
        foreach ($service->serviceProducts as $serviceProduct) {
            if ($serviceProduct->product->quantity < 1) {
                return redirect()->route('bookService')->with('error', 'Products in service unavailable.');
            }
        }

        return view('calender');
    }
}
