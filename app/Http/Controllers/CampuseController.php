<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\role;
use App\Http\Controllers\Controller;
use DB;

class CampuseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camp = DB::select('SELECT * FROM campuses');
        $state = DB::select('SELECT * FROM states');
        $data = DB::table('campuses')
            ->select('campuses.*','citys.city_name','states.state_name')
            ->join('citys', 'campuses.city_id', '=', 'citys.city_id')
            ->join('states', 'campuses.state_id', '=', 'states.state_id')
            ->where('is_block','=',0)
            ->get();
        return view('pages.addcampus')
                ->with('camp',$camp)
                ->with('state',$state)
                ->with('data',$data);
    }
    public function getCityList(Request $request)
    {
        $states = DB::table("citys")
        ->where("state_id",$request->state_id)
        ->pluck("city_name","city_id");
        return response()->json($states);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $camp_name= Input::get("camp_name");
        $email= Input::get("email");
        $address= Input::get("address");
        $city_id= Input::get("city");
        $state_id= Input::get("state");
        $phone_no= Input::get("phno");
        $is_block=0;
        DB::insert('insert into campuses(camp_name,email,address,city_id,state_id,phone_no,is_block) values (?,?,?,?,?,?,?)',[$camp_name,$email,$address,$city_id,$state_id,$phone_no,$is_block]);
        return redirect('/addcampus')->with('alert','Register successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\campuse  $campuse
     * @return \Illuminate\Http\Response
     */
    public function show(campuse $campuse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\campuse  $campuse
     * @return \Illuminate\Http\Response
     */
    public function edit_campus($camp_id)
    {
        $data= DB::table('campuses')
            ->SELECT('campuses.*','citys.city_name','states.state_name')
            ->join('citys','citys.city_id','=','campuses.city_id')
            ->join('states','states.state_id','=','campuses.state_id')
            ->where('camp_id',$camp_id)->first();
        $state = DB::select('SELECT * FROM states');
        return view('pages.update_campus')->with('data',$data)
                                        ->with('state',$state)
                                        ->with('camp_id',$camp_id);

    }
    public function update_campus(Request $request,$id)
    {
        $camp_name= Input::get("camp_name");
        $email= Input::get("email");
        $address= Input::get("address");
        $city_id= Input::get("city");
        $state_id= Input::get("state");
        $phone_no= Input::get("phno");
        $is_block=0;
        DB::update('update campuses set camp_name=?,email=?, phone_no=?,address=?, city_id=?,state_id=? where camp_id = ?', [$camp_name,$email,$phone_no,$address,$city_id,$state_id,$id]);
        return redirect('/addcampus')->with('alert','Update successfully');
    }

    public function destroy($id)
    {
        $camp_id=$id;
        DB::update('update campuses set is_block=? where camp_id = ?', [1,$camp_id]);    
        return redirect('/addcampus')->with('alert','Deleted Successfully');
    }
}
