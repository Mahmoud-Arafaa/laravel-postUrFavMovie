<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function services(){
        $param="send it from controller to view and display++!";
        $data = ['title'=>"Hello This is Title!", 'services'=>['Hello From Array of Array','its been along day']];
        return view('pages.services',compact('param'))->with($data);
    }
    public function about()
    {
        return view('pages.about');
    }
}
