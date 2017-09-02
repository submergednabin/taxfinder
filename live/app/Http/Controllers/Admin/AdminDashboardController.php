<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\TaxiBooking;
use App\User;
use App\Admin;
use App\MailLog;
use DB;
use Validator;
use Mail;

class AdminDashboardController extends Controller
{
	public function __construct(){

		$this->middleware('admin',['only'=>['index','getSentMailList','composeNewMail','destroySentMail']]);
		$this->middleware('admin.guest',['only'=>'getLogin']);
	}
    public function index(){
    	return view('taxifare.admin.dashboard.index');
    }
    public function getLogin(){

    	return view('taxifare.admin.AdminLogin.login')->with('title','Admin Login | Taxi Fare Finder');
    }

    public function postLogin(Request $request){
    	if(Auth::guard('admin')->attempt([
    		'email'=>$request->email,
    		'password'=>$request->password,
    	])){
    		return redirect('admin/dashboard');
    	}
    	Auth::guard('admin')->logout();
    	return redirect('admin')
    		->withInput($request->only('email'))
    		->withErrors(['email'=>'Invalid Email/Password']);
    }

    public function getListofBookedTaxi(){
        $taxiLists = TaxiBooking::orderBy('id','Desc')->get();
        return view('taxifare.admin.booking.index',compact('taxiLists'));
    }

    public function destroyBookings(Request $request, $id){
        if(!request()->ajax()){
            return false();
        }
        $taxiBooked = TaxiBooking::find($id);
        $taxiBooked->delete();
        session()->flash('message','The Booking is deleted successfully.');
        return response()->json(array(
            'status' => 'success',
            'url'    => url('admin/taxi-booking')
        ));
    }

    public function composeNewMail(){
        $user = User::select('id',
        DB::raw('CONCAT_WS(" ",first_name,middle_name,last_name ) AS full_name') )->pluck('full_name', 'id');
        return view('taxifare.admin.booking.compose-mail',compact('user'));
    }

    

    public function sendMailToDriver(Request $request){
        $rules = [
            'email_receiver'=>'required',
            'email_sender'=>'required',
            'booked_by'=>'required',
            'message'=>'required',
        ];
        $validate = Validator::make($request->all(),$rules);
        if($validate->fails()){
            return redirect('admin/compose-mail')
                ->withErrors($validate)
                ->withInput();
        }else{
            $input = $request->all();
            $receiver_address = $request->email_receiver;
            $sender_address = $request->email_sender;
            $messages_data = $request->message;
            $subject = $request->subject;
            $user_id = $request->booked_by;
            $user = User::find($user_id);
            $first_name = $user->first_name;
            $middle_name = $user->middle_name;
            $last_name = $user->last_name;
            if($middle_name){
                $fullname = $first_name.' '.$middle_name.' '.$last_name;
            }else{

                $fullname = $first_name.' '.$last_name;
            }
            $taxiBook = TaxiBooking::where('user_id',$user_id)->orderBy('updated_at','DESC')->first();
            $no_passenger = $taxiBook->no_passenger;
            $pickup_time = $taxiBook->pickup_time;
            $pickup_date = $taxiBook->pickup_date;
            $start_location = $taxiBook->start_location;
            $end_location = $taxiBook->end_location;
            $estimated_fare = $taxiBook->estimated_fare;
            
            
            $data = [
                'receiver_address' => $request->email_receiver,
                'sender_address'=>$request->email_sender,
                'messages'=>$request->message,
                'subject'=>$request->subject,
                'fullname'=>$fullname,
                'no_passenger'=>$no_passenger,
                'pickup_date'=>$pickup_date,
                'pickup_time'=>$pickup_time,
                'start_location'=>$start_location,
                'end_location'=>$end_location,
                'estimated_fare'=>$estimated_fare,
            ];
            
            Mail::send('taxifare.admin.booking.emailMessageTemplate', $data,function($message) use($sender_address,$receiver_address,$messages_data,$fullname,$subject){

                $message->from($sender_address);
                $message->to($receiver_address)
                        ->subject($subject);
            });
            if(Mail::failures()){
                session()->flash('message','Sorry, unable to send mail');
                return redirect('admin/compose-mail')->withInput();
            }
            $input['booking_id'] = $taxiBook->id; 
            $input['messages'] = $request->message;
            $input['sender_address'] = $request->email_sender;
            $input['receiver_address'] = $request->email_receiver;
            $input['no_passenger'] = $no_passenger;
            $input['pickup_time'] = $pickup_time;
            $input['pickup_date'] = $pickup_date;
            $input['start_location'] = $start_location;
            $input['end_location'] = $end_location;
            $input['estimated_fare'] = $estimated_fare;
            $saveMail = MailLog::create($input);
            session()->flash('message',"Message Sent Successfully.");
            return redirect('admin/compose-mail');

        }
    }

    public function getSentMailList(){
        $sentMails = MailLog::all();
        return view('taxifare.admin.booking.sent-mail',compact('sentMails'));
    }

    public function destroySentMail(Request $request,$id){
        if(!$request->ajax()){
            return false;
        }
        $findSentMail = MailLog::find($id);
        $findSentMail->delete();
        session()->flash('message','Deleted Successfully.');
        return response()->json([
            'status'=>'success',
            'url'=>url('admin/mail-sent'),
        ]);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin');
    }
}
