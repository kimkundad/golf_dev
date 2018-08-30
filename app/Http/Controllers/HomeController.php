<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function about(){
      return view('about');
    }

    public function contact(){
      return view('contact');
    }

    public function regis_tech(){
      return view('regis_tech');
    }

    public function search(){
      return view('search');
    }

    public function single_tech(){
      return view('single_tech');
    }

    public function map_api(){
        return response()->json([
        'win' => 'success','win' => 'success'
      ]);

    }

}
