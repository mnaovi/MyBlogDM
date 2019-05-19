<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index()
    {
    	return view('user.home');
    }

    public function about()
    {
    	return view('user.about');
    }

    public function contact()
    {
    	return view('user.contact');
    }
}
