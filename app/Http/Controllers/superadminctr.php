<?php

namespace App\Http\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;
use DB;
use App\role;
class superadminctr extends Controller
{
    public function index()
    {
        $data  = DB::select('SELECT * FROM roles');
        $camp = DB::select('SELECT * FROM campuses');
        $state = DB::select('SELECT * FROM states');
        return view('pages.superadmin')
                ->with('data',$data)
                ->with('camp',$camp)
                ->with('state',$state);
    }

    public function filterdate(Request $request)
    {
        $c=$this->countcomplain();
        $date1=$request->date1;
        $date2=$request->date2;
        $d1=date("Y-m-d", strtotime($date1));
        $d2=date("Y-m-d", strtotime($date2));
        $data = DB::table('complains')
            ->select('complains.*','registrations.firstname','campuses.camp_name')
            ->join('registrations', 'registrations.rid', '=', 'complains.rid')
            ->join('campuses', 'complains.camp_id', '=', 'campuses.camp_id')
            ->where('complains.start_date',$d1)
            ->where('complains.comp_date',$d2)
            ->get();
            return view('pages.superadmin')
                    ->with('user',$c->user)
                    ->with('piu_auth',$c->piu_auth)
                    ->with('admin',$c->admin)
                    ->with('piu_staff',$c->piu_staff)
                    ->with('complain',$c->complain)
                    ->with('complete',$c->complete)
                    ->with('approve',$c->approve)
                    ->with('inprocess',$c->inprocess)
                    ->with('data',$data);
    }
    public function create()
    {
        //
    }
    public function manageadmin()
    {
        // $data=DB::select('SELECT * FROM registrations WHERE role_id=?',[2]);    
        $data = DB::table('registrations')
            ->select('registrations.*','citys.city_name','states.state_name','campuses.camp_name')
            ->join('citys', 'registrations.city_id', '=', 'citys.city_id')
            ->join('states', 'registrations.state_id', '=', 'states.state_id')
            ->join('campuses', 'registrations.camp_id', '=', 'campuses.camp_id')
            ->where('role_id','=',2)
            ->get();
        return view('pages.manageadmin')->with('data',$data);
    }
    public function countcomplain()
    {   
        $c=new superadminctr();
        $c->complain= DB::table('complains')->count();
        $c->complete= DB::table('complains')->where('status','=','Completed')->count();
        $c->approve= DB::table('complains')->where('status','=','Pending')->count();
        $c->inprocess= DB::table('complains')->where('status','=','In Progress')->count();
        $c->user= DB::table('registrations')->count();
        $c->admin= DB::table('registrations')->where('role_id','=',2)->count();
        $c->piu_auth= DB::table('registrations')->where('role_id','=',3)->count();
        $c->piu_staff= DB::table('registrations')->where('role_id','=',4)->count();
        return $c;
    }
    public function viewcomplain()
    {
        $c=$this->countcomplain();
        $data = DB::table('complains')
            ->select('complains.*','registrations.firstname','registrations.lastname','campuses.camp_name','complain_cat.comp_name','complain_type.type_name')
            ->join('registrations', 'registrations.rid', '=', 'complains.rid')
            ->join('campuses', 'complains.camp_id', '=', 'campuses.camp_id')
            ->join('complain_cat', 'complain_cat.comp_cat_id', '=', 'complains.comp_cat_id')
            ->join('complain_type', 'complains.type_id', '=', 'complain_type.type_id')
            ->get();
        return view('pages.superadmin')
                    ->with('user',$c->user)
                    ->with('piu_auth',$c->piu_auth)
                    ->with('admin',$c->admin)
                    ->with('piu_staff',$c->piu_staff)
                    ->with('complain',$c->complain)
                    ->with('complete',$c->complete)
                    ->with('approve',$c->approve)
                    ->with('inprocess',$c->inprocess)
                    ->with('data',$data);

    }
    public function viewtabledata(Request $request)
    {
        $cid=$request->cid;
        $data=DB::table('complains')
                ->select('complains.*','complain_type.type_name','campuses.camp_name')
                ->join('complain_type','complain_type.type_id','=','complains.type_id')
                ->join('campuses', 'complains.camp_id', '=', 'campuses.camp_id')
                ->where('cid','=',$cid)->first();
        //$data=DB::select('select * from complains where cid=?',[$cid]);
        $output="";
        $output .= '  
        <div class="table-responsive">  
           <table class="table table-bordered">';
           $output .= '
            <tr>    
                <td width="100%" colspan="2"><img src="'.$data->photo.'" alt="Image" align="center" class="img-rounded img-responsive" style="width:300px;"/></td>  
            </tr>   
            <tr>  
                <td width="30%"><label>Type</label></td>  
                <td width="70%">'.$data->type_name.'</td>  
            </tr>  
            <tr>  
                <td width="30%"><label>Description</label></td>  
                <td width="70%">'.$data->description.'</td>  
            </tr>
            <tr>  
                <td width="30%"><label>Campuse Name</label></td>  
                 <td width="70%">'.$data->camp_name.'</td>  
            </tr> 
            <tr>  
                     <td width="30%"><label>Reson</label></td>  
                     <td width="70%">'.$data->reason.' Year</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Status</label></td>  
                     <td width="70%">'.$data->status.'</td>  
                </tr>

                <tr>  
                     <td width="30%"><label>Start Date</label></td>  
                     <td width="70%">'.$data->start_date.'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>End Date</label></td>  
                     <td width="70%">'.$data->comp_date.'</td>  
                </tr> 
                
                ';  
    //   }  
      $output .= "</table></div>";  
      echo $output; 
      //return response()->json($output); 
    }
    public function edit_admin($rid)
    {
       //
        $data= DB::table('registrations')
                ->select('registrations.*','citys.city_name','states.state_name','campuses.camp_name')
                ->join('citys','citys.city_id','=','registrations.city_id')
                ->join('states','states.state_id','=','registrations.state_id')
                ->join('campuses','campuses.camp_id','=','registrations.camp_id')
                ->where('rid',$rid)->first();
        $role_type=DB::table('roles')->where('role_id','=',2)->first();
        //$role_type=role::select('role_type')->where('role_id','=',2)->get();
        $camp = DB::select('SELECT * FROM campuses');
        $state = DB::select('SELECT * FROM states');
        return view('pages.update_admin')->with('data',$data)
                                        ->with('camp',$camp)
                                        ->with('state',$state)
                                        ->with('role_type',$role_type)
                                        ->with('rid',$rid);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_admin(Request $request, $rid)
    {
        $fname=$request->fname;
        $lname=$request->lname;
        $email=$request->email;
        $phno=$request->phno;
        $role=$request->role;
        $address=$request->address;
        $city=$request->city;
        $state=$request->state;
        $campuse=$request->campuse;
        DB::update('update registrations set firstname=?,lastname=?, email=?, phone_no=?, role_id=?, address=?, city_name=?,state_name=?,camp_id=? where rid = ?', [$fname,$lname,$email,$phno,$role,$address,$city,$state,$campuse,$rid]);
        return redirect('/manageadmin')->with('alert','Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rid=$id;
        DB::update('update registrations set is_block=? where rid = ?', [1,$rid]);
        $data=DB::select('SELECT * FROM registrations WHERE role_id=?',[2]);    
        return redirect('/manageadmin')->with('data',$data)->with('alert','Deleted Successfully');
    }
    public function addcomplain(Request $request)
    {
        $comp_name=$request->comp_name;
        DB::insert('Insert into complain_cat(comp_name) values(?)',[$comp_name]);
        return redirect('/addcomplain')->with('alert','Insert Successfully');
    }
    public function selectcomplain()
    {
        $data=DB::select("select * from complain_cat");
        $data1= DB::table('complain_type')
            ->select('complain_type.*','complain_cat.comp_name')
            ->join('complain_cat', 'complain_cat.comp_cat_id', '=', 'complain_type.comp_cat_id')
            ->get();
        return view('pages.addcomplain')->with('data',$data)->with('data1',$data1);
    }
    public function addtype(Request $request)
    {
        $complain_cat=$request->complain_cat;
        $type_name=$request->type_name;
        $comp_name=DB::select('select comp_name from complain_cat where comp_cat_id=?',[$complain_cat]);
        
        DB::insert('Insert into complain_type(comp_cat_id,type_name) values(?,?)',[$complain_cat,$type_name]);
       //DB::insert('Insert into complain_type(comp_cat_id,type_name,comp_name) values(?,?,?)',[$complain_cat,$type_name,$comp_name]);
        return redirect('/addcomplain')->with('alert','Insert Successfully');
    }
    public function deletecomplain($id)
    {
        DB::delete('DELETE from complain_cat where comp_cat_id=?',[$id]);
        DB::delete('DELETE from complain_type where comp_cat_id=?',[$id]);
        return redirect('/addcomplain')->with('alert','Deleted Successfully');
    }
    public function deletetype($id)
    {
        DB::delete('DELETE from complain_type where type_id=?', [$id]);
        return redirect('/addcomplain')->with('alert','Deleted Successfully');
    }
}
