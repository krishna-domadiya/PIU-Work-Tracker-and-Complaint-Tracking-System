<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessioncontroller extends Controller
{
    //
    public function get(Request $request)
    {
        if($request->session()->has('firstname'))
            echo $request->session()->get('myname');
        else
            echo 'No data Found';
    }
    public function setsession(Request $request)
    {
        $request->session()->put('firstname');
    }
}
