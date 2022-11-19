<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\registration;
use App\worker;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Session;
require '../vendor/autoload.php';

class piuauthctr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function campusid()
    {
        $value=Session::get('rid');
        if($value=='')
        {
            return redirect('/login');
        }
        $camp_id=DB::table('registrations')->where('rid','=',$value)->pluck('camp_id');
        return $camp_id;
    }
    public function index()
    {
        $camp_id=$this->campusid();   
        $data = DB::table('complains')
            ->select('complains.*','campuses.camp_name','registrations.firstname','registrations.lastname','campuses.camp_name','complain_cat.comp_name','complain_type.type_name')
            ->join('registrations', 'registrations.rid', '=', 'complains.rid')
            ->join('campuses', 'complains.camp_id', '=', 'campuses.camp_id')
            ->join('complain_cat', 'complain_cat.comp_cat_id', '=', 'complains.comp_cat_id')
            ->join('complain_type', 'complains.type_id', '=', 'complain_type.type_id')
            ->where('complains.camp_id','=',$camp_id)
            ->get();
        $c=$this->countnumber();
        return view('pages.piuauthority.piuautho')->with('complain',$c->complain)
                                            ->with('complete',$c->complete)
                                            ->with('approve',$c->approve)
                                            ->with('inprocess',$c->inprocess)
                                            ->with('data',$data);
    }

    public function index1($id)
    {
        $value=Session::get('rid');
        if($value=='')
        {
            return redirect('/login');
        }
        $camp_id=DB::table('registrations')->where('rid','=',$value)->pluck('camp_id');
        if ($id==1) {
            $data=DB::table('complains')
            ->select('complains.*','campuses.camp_name','registrations.firstname','registrations.lastname','campuses.camp_name','complain_cat.comp_name','complain_type.type_name')
            ->join('registrations', 'registrations.rid', '=', 'complains.rid')
            ->join('campuses', 'complains.camp_id', '=', 'campuses.camp_id')
            ->join('complain_cat', 'complain_cat.comp_cat_id', '=', 'complains.comp_cat_id')
            ->join('complain_type', 'complains.type_id', '=', 'complain_type.type_id')
            ->where('complains.camp_id','=',$camp_id)
            ->where('complains.status','=','Completed')
            ->get();
        }
        elseif ($id==2) {
            $data=DB::table('complains')
            ->select('complains.*','campuses.camp_name','registrations.firstname','registrations.lastname','campuses.camp_name','complain_cat.comp_name','complain_type.type_name')
            ->join('registrations', 'registrations.rid', '=', 'complains.rid')
            ->join('campuses', 'complains.camp_id', '=', 'campuses.camp_id')
            ->join('complain_cat', 'complain_cat.comp_cat_id', '=', 'complains.comp_cat_id')
            ->join('complain_type', 'complains.type_id', '=', 'complain_type.type_id')
            ->where('complains.camp_id','=',$camp_id)
            ->where('complains.status','=','Pending')
            ->get();
        } 
        else {
            $data=DB::table('complains')
            ->select('complains.*','campuses.camp_name','registrations.firstname','registrations.lastname','campuses.camp_name','complain_cat.comp_name','complain_type.type_name')
            ->join('registrations', 'registrations.rid', '=', 'complains.rid')
            ->join('campuses', 'complains.camp_id', '=', 'campuses.camp_id')
            ->join('complain_cat', 'complain_cat.comp_cat_id', '=', 'complains.comp_cat_id')
            ->join('complain_type', 'complains.type_id', '=', 'complain_type.type_id')
            ->where('complains.camp_id','=',$camp_id)
            ->where('complains.status','=','In Process')
            ->get();
        }
        $camp_id=$this->campusid();
        $c=$this->countnumber();
        return view('pages.piuauthority.piuautho')->with('complain',$c->complain)
                                            ->with('complete',$c->complete)
                                            ->with('approve',$c->approve)
                                            ->with('inprocess',$c->inprocess)
                                            ->with('data',$data);
    }

    public function countnumber()
    {
        $camp_id=$this->campusid();
        $c= new piuauthctr;
        $c->complain= DB::table('complains')->where('complains.camp_id','=',$camp_id)->count();
        $c->complete= DB::table('complains')->where('status','=','Completed')->where('camp_id','=',$camp_id)->count();
        $c->approve= DB::table('complains')->where('status','=','Pending')->where('camp_id','=',$camp_id)->count();
        $c->inprocess= DB::table('complains')->where('status','=','In Process')->where('camp_id','=',$camp_id)->count();
        return $c;
    }
    public function AddPiuStaff()
    {
        $data  = DB::select('SELECT * FROM roles');
        $camp = DB::select('SELECT * FROM campuses');
        $state = DB::select('SELECT * FROM states');
        return view('pages.addpiustaff')
                ->with('data',$data)
                ->with('camp',$camp)
                ->with('state',$state);
    }
    public function mail1($wid,$id,$date)
    {
        $email=DB::table('registrations')->where('rid','=',$wid)->value('email');
        $comp=DB::table('complains')
            ->select('complains.*','complain_type.type_name')
            ->join('complain_type','complain_type.type_id','=','complains.type_id')
            ->where('cid','=',$id)->first();
        $email1= $this->clean_string($email);
        $mailsub=$comp->type_name;
        $mailsub=$comp->type_id;
        if(($comp->is_emergency)==1){
            $emergency="Yes";
        }else{
            $emergency="No";
        }

        $mailmsg = "<b>Location:</b> ".$comp->location."<br>";
        $mailmsg .= "<b>Approximate Date:</b> ".$date."<br>";
        $mailmsg .= "<b>Emergency:</b> ".$comp->is_emergency."<br>";
        $mailmsg .= "<b>Description:</b> ".$comp->description."<br>";

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
        $mail->AddAddress($email);
        return "Mail sent";

    }
    public function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    public function map(Request $request)
    {
        $wid0="";$wname0="";
        $wid1="";$wname1="";
        $wid2="";$wname2="";
        $no=$_GET['rowcount'];
        $id=$_GET['id'];
        $date=$_GET['approxdate'];
        echo "Row Count =".$no."</br>";
        if(isset($_GET['wid0'])){
            $wid0=$_GET['wid0'];
            $wname0=$_GET['wname0'];
            echo $wid0;
            $m=$this->mail1($wid0,$id,$date);
        }
        if(isset($_GET['wid1'])){
            $wid1=$_GET['wid1'];
            $wname1=$_GET['wname1'];
            echo $wid1;
            $m.=$this->mail1($wid1,$id,$date);
        }
        if(isset($_GET['wid02'])){
            $wid2=$_GET['wid2'];
            $wname2=$_GET['wname2'];
            echo $wid2;
            $m.=$this->mail1($wid2,$id,$date);
        }
        $user= new worker;
        $user->cid= $id;
        $user->worker1= $wname0;
        $user->worker2= $wname1;
        $user->worker3= $wname2;
        $user->save();
        $worker_id=DB::table('workers')->where('cid','=',$id)->value('wid');
        $sdate=date("Y-m-d");
        echo $m;
        echo "<script type='text/javascript'>alert(".$date.");</script>";
        $newdate=date("Y-m-d",strtotime($date));
        echo "<script type='text/javascript'>alert('$newdate');</script>";
        DB::update('update complains set wid=?,status=?,start_date=?,app_comp_date=?,is_approve=? where cid = ?', [$worker_id,"In Progress",$sdate,$newdate,1,$id]);
        return redirect('/piuauthority/dashboard');
    }

    public function show_complain($cid)
    {
        
        $data= DB::table('complains')
                ->select('complains.*','complain_cat.comp_name','complain_type.type_name')
                ->join('complain_cat', 'complain_cat.comp_cat_id', '=', 'complains.comp_cat_id')
                ->join('complain_type', 'complains.type_id', '=', 'complain_type.type_id')
                ->where('cid','=',$cid)
                ->first();
        $c=$this->countnumber();
        $user=DB::select('select rid,firstname,lastname from registrations where comp_name=?',[$data->comp_name]);
        if(($data->is_approve)==0){
            return view('pages.piuauthority.showcomplain')->with('complain',$c->complain)
            ->with('complete',$c->complete)
            ->with('approve',$c->approve)
            ->with('inprocess',$c->inprocess)
            ->with('data',$data)
            ->with('user',$user)
            ->with('cid',$cid);
        }
        else{
            $worker=DB::table('workers')->where('cid','=',$cid)->first();
            //$worker=DB::select('SELECT * from workers where cid=?',[$cid]);
            return view('pages.piuauthority.approvedcomplain')->with('complain',$c->complain)
                                            ->with('complete',$c->complete)
                                            ->with('approve',$c->approve)
                                            ->with('inprocess',$c->inprocess)
                                            ->with('data',$data)
                                            ->with('user',$user)
                                            ->with('cid',$cid)
                                            ->with('worker',$worker);
        }
    }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setcomplete(Request $request)
    {
        $cid=$_GET["cid"];
        $sdate=date("Y-m-d");
        DB::update('update complains set status=?,comp_date=? where cid=?',["Completed",$sdate,$cid]);
        return redirect('showcomplain/'.$cid);
    }
    public function destroy($id)
    {
        //
    }
}
