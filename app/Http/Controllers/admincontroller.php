<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\role;
use App\Http\Controllers\Controller;
use DB;
use App\registration;
use Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $value=Session::get('rid');
            if($value=='')
            {
                return redirect('/login');
            }
            $camp_id=DB::table('registrations')->where('rid','=',$value)->pluck('camp_id');
              $data=DB::table('complains')
            ->select('complains.*','complain_cat.comp_name','complain_type.type_name','registrations.firstname','registrations.lastname','campuses.camp_name')
            ->join('registrations', 'registrations.rid', '=', 'complains.rid')
            ->join('campuses', 'complains.camp_id', '=', 'campuses.camp_id')
            ->join('complain_cat', 'complain_cat.comp_cat_id', '=', 'complains.comp_cat_id')
            ->join('complain_type', 'complains.type_id', '=', 'complain_type.type_id')
             ->where('complains.camp_id','=',$camp_id)->get();
                         
            $user=registration::where('camp_id' , $camp_id)
                ->where('role_id','>',1)
                ->count();
            $admin= DB::table('registrations')->where('role_id','=',3)->where('camp_id','=',$camp_id)->count();
            $piu_auth= DB::table('registrations')->where('role_id','=',4)->where('camp_id','=',$camp_id)->count();
            $piu_staff= DB::table('registrations')->where('role_id','=',5)->where('camp_id','=',$camp_id)->count();
            $c=$this->countno($camp_id);
            return view('pages.admin')->with('data',$data)
                                    ->with('user',$user)
                                    ->with('piu_auth',$piu_auth)
                                    ->with('admin',$admin)
                                    ->with('piu_staff',$piu_staff)
                                    ->with('complain',$c->complain)
                                    ->with('complete',$c->complete)
                                    ->with('approve',$c->approve)
                                    ->with('inprocess',$c->inprocess);
        }
    }
    public function countno($camp_id)
    {
        $c= new admincontroller;
        $c->complain= DB::table('complains')->where('camp_id','=',$camp_id)->count();
        $c->complete= DB::table('complains')->where('status','=','Completed')->where('camp_id','=',$camp_id)->count();
        $c->approve= DB::table('complains')->where('status','=','Pending')->where('camp_id','=',$camp_id)->count();
        $c->inprocess= DB::table('complains')->where('status','=','In Progress')->where('camp_id','=',$camp_id)->count();
        return $c;
    }
   public function add_staff_piu()
   {
       $value=Session::get('rid');
    if($value=='')
    {
        return redirect('/login');
    }
    $camp_id=DB::table('registrations')->where('rid','=',$value)->pluck('camp_id');
    $data  = DB::select('SELECT * FROM roles');
    $camp = DB::select('SELECT * FROM campuses');
    $state = DB::select('SELECT * FROM states');
    $cat = DB::select('SELECT * FROM complain_cat');
    return view('pages.add staff piu')
            ->with('data',$data)
            ->with('camp',$camp)
            ->with('state',$state)
            ->with('cat',$cat);
   }
   public function manage_staff_piu()
   {
    $value=Session::get('rid');
    if($value=='')
    {
        return redirect('/login');
    }
    $camp_id=DB::table('registrations')->where('rid','=',$value)->pluck('camp_id');
           $data = DB::table('registrations')
        ->select('registrations.*','campuses.camp_name','citys.city_name','states.state_name','campuses.camp_id')
        ->join('campuses', 'campuses.camp_id', '=', 'registrations.camp_id')
        ->join('citys','citys.city_id','=','registrations.city_id')
        ->join('states','states.state_id','=','registrations.state_id')
        ->where('role_id','>',2)
        ->where('campuses.camp_id','=',$camp_id)
        ->get();
       
       
         //$data= DB::select('SELECT * from registrations where role_id=? OR role_id=? OR role_id=?',[3,4,5]);
       //$cname=DB::select('SELECT camp_name from campuses where camp_id=?',[$data->camp_id]);
       $role=DB::select('SELECT * FROM roles where role_id>?',[2]);
       return view('pages.managestaffpiu')->with('data',$data)
                                        ->with('role',$role);
   }
    // public function getTypeList(Request $request)
    // {
    //    $category = DB::table("complain_type")
    //                 ->where("comp_name",$request->comp_name)
    //                 ->pluck("type_name","type_id") or die("not work");
    //    return response()->json($category);
    // }
    public function staff_piu(Request $request)
    {
        $user= new registration;
        $user->firstname= Input::get("fname");
        $user->lastname= Input::get("lname");
        $user->email= Input::get("email");
        $user->password= Input::get("password");
        $user->phone_no= Input::get("phno");
        $user->role_id = Input::get("role");
        $user->comp_name = Input::get("category");
        $user->address= Input::get("address");
        $user->city_id= Input::get("city");
        $user->state_id= Input::get("state");
        $user->camp_id= Input::get("campuse");
        $user->is_block=0;
        $user->save();
        $mailsub="PIU W.T.C.T";
        $mailmsg = "<b> Hello ".$user->firstname." ".$user->lastname."</b><br>";
        $mailmsg .= "Registartion Successfully..!<br>";
        $mailmsg .= "<b>Email Id: </b> ".$user->email."<br>";
        $mailmsg .= "<b>Password: </b> ".$user->password."<br>";
        $mail= new PHPMailer(true);
        $mail->isSmtp();
        $mail->SMTPDebug=1;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Host="smtp.gmail.com";
        $mail->Port=587;//or 587 465
        $mail->IsHTML(true);
        $mail->Username="piuwtct@gmail.com";
        $mail->Password="piuwtct123";
        $mail->setFrom("piuwtct@gmail.com","PIUWTCT");
        $mail->Subject=$mailsub;
        $mail->Body=$mailmsg;
        $mail->AddAddress($user->email);
        if(!$mail->Send())
        {
            return "Mail not sent";
        }
        return redirect('/add staff piu')->with('alert','Register successfully');
    }
    public function filter(Request $request)
    {
        $role=$request->role;
        $no=0;
        if($role=='ALL')
        {
            return redirect('/managestaffpiu');
        }
        elseif($role=='PIU Authority')
        {
            $data=DB::select('SELECT * from registrations where role_id=?',[3]);
        }
        elseif($role=='Staff')
        {
            $data=DB::select('SELECT * from registrations where role_id=?',[4]);
        }
        else
        {
            $no=5;
            $data=DB::select('SELECT * from registrations where role_id=?',[5]);
            $role=DB::select('SELECT * FROM roles where role_id>?',[2]);
        }
        //echo "<script>alert('hello')</script>";
        $role=DB::select('SELECT * FROM roles where role_id>?',[2]);
            return view('pages.managestaffpiu')->with('data',$data)
                                            ->with('role',$role)->with('no',$no);
    }
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
    public function edit_staff_piu($rid)
    {
        $data= DB::table('registrations')->where('rid',$rid)->first();
        $role_type=DB::table('roles')->select('role_type')->where('role_id','=',$data->role_id)->first();
        //$role_type=role::select('role_type')->where('role_id','=',2)->get();
        $camp = DB::select('SELECT * FROM campuses');
        $state = DB::select('SELECT * FROM states');
        return view('pages.update_staff_piu')->with('data',$data)
                                        ->with('camp',$camp)
                                        ->with('state',$state)
                                        ->with('role_type',$role_type)
                                        ->with('rid',$rid);
    }

    public function update_staff_piu(Request $request, $rid)
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
        return redirect('/managestaffpiu')->with('alert','Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
