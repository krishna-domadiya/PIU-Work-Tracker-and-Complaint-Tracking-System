<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\role;
use App\Http\Controllers\Controller;
use DB;
use App\registration;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

class rolecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data  = DB::select('SELECT * FROM roles');
        $camp = DB::select('SELECT * FROM campuses');
        $state = DB::select('SELECT * FROM states');
        return view('pages.registration')
                ->with('data',$data)
                ->with('camp',$camp)
                ->with('state',$state);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $email_id=$request->input('email');
    	$password=$request->input('password');
 
        $data=DB::select('select * from registrations where email=? and password=?', [$email_id,$password]);
       if(count($data))
  	 	{
         foreach ($data as $d) 
         {
            $rid=$d->rid;
            $fname=$d->firstname;
            $email=$d->email;
            $phno=$d->phone_no;
            $role_id=$d->role_id;
            $password=$d->password;   
            session(['rid' => $rid]);
            session(['fname' => $fname]);
            session(['email' => $email]);
            session(['phno' => $phno]);
            session(['role_id' => $role_id]);
            session(['password' => $password]);
           if($role_id==1)
                return redirect('/superadmin');
           elseif($role_id==2)
               return redirect('/admin');
           elseif($role_id==3)
               return redirect('/piuauthority/dashboard');  
         }
        
     } 
     else
     {
         $message = "Username and/or Password incorrect.\\nTry again.";
         echo "<script type='text/javascript'>alert('$message');</script>";
         return view('pages.login');
     }
     }
     public function nosession(request $request)
     {
         return view('pages.login');
     } 
     public function getCityList(Request $request)
        {
            $states = DB::table("citys")
            ->where("state_id",$request->state_id)
            ->pluck("city_name","city_id");
            return response()->json($states);
     }

    public function create()
    {
        
        return view('pages.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= new registration;
        $user->firstname= Input::get("fname");
        $user->lastname= Input::get("lname");
        $user->email= Input::get("email");
        $user->phone_no= Input::get("phno");
        $user->password= Input::get("password");
        $user->role_id = Input::get("role");
        $user->comp_name = "";
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
        return redirect('/manageadmin')->with('alert','Register successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        //
    }
    public function add_admin()
    {
        //
        $data  = DB::select('SELECT * FROM roles');
        $camp = DB::select('SELECT * FROM campuses');
        $state = DB::select('SELECT * FROM states');
        return view('pages.add_admin')
                ->with('data',$data)
                ->with('camp',$camp)
                ->with('state',$state);
    }
    public function update(Request $request, $id)
    {
        //
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
