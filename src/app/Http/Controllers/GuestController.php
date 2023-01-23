<?php

namespace App\Http\Controllers;

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
}
