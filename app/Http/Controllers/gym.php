<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\excercises;
use App\trainer_tables;
use DB;
use Illuminate\Http\Request;

class gym extends Controller
{
    // @return \Illuminate\Http\Response
    public function getdata()
    {
        $data  = DB::select('SELECT * FROM excercises');
        return view('table_insert')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function putdata(Request $request)
    {   
        $week= $request->input('week');
         $day= $request->input('day');
         $excercise_name= $request->input('excercise');
         $is_block=$request->input('block');
         $img=DB::select('select img from excercises where excercise_name=?',[$excercise_name]);
         DB::insert('insert into trainer_tables(week,day,excercise_name,img,is_block) values (?,?,?,?)',[$week,$day,$excercise_name,$img,$is_block]);
         return redirect('/table_insert')->with('img',$img);
    }
}
