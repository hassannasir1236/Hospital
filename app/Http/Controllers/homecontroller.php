<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\add_doctor;
use App\Models\appointment;
use Illuminate\Support\Facades\Auth;
class homecontroller extends Controller
{
    function redirect(){
         if (Auth::id()) {
             if (Auth::user()->usertype=='typeadmin') {
                 return view('admin/home');
             }
             else{
             $doctorinfo = add_doctor::all();
        return view('user.home',compact('doctorinfo'));          
             }
         }else{
            return redirect->back();
         }
    }
    function  index(){
        if (Auth::id()) {
            return redirect('home');
        }else{
      $doctorinfo = add_doctor::all();
        return view('user.home',compact('doctorinfo'));
            }
    }
    function appointment(Request $req){
           $req->validate([
            
        'user_name' => 'required|max:255',
        'user_email' => 'required|max:255',
        'appointment_time' => 'required',
        'user_phoneNo' => 'required|max:255',
        'speciality' => 'required|max:255',
        'message' => 'required|max:255',          
        ]);
          $data= new appointment();
          if(Auth::id()){
            $data->user_id=Auth::user()->id;
            $data->user_name=$req->user_name;
            $data->user_email=$req->user_email;
            $data->appointment_time=$req->appointment_time;
            $data->user_phoneNo=$req->user_phoneNo;
            $data->speciality=$req->speciality;
            $data->message=$req->message;
            $data->status="In Progress";
            $data->save();
        if($data){
            return back()->with('success','Congrats your appointment has be send to doctor');
        }else{
          return back()->with('fail','Product is not Store');  
        }
          }
          return back()->with('fail','Please Login first then you can take appointment');  
    }
    public function myappointment()
    {
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $appoint = appointment::where('user_id',$userid)->get();
            return view('user.myappointment',compact('appoint'));
        }
        return redirect()->back();
    }
    public function delete_myappointment($id)
    {
       $data= appointment::find($id)->delete();
        if($data){
            return redirect()->back()->with('success','Congrats your appointment has be send to doctor');
        }else{
          return redirect()->back()->with('fail','Product is not Store');  
        }
    }
    public function fetch_myappointment($id)
    {
         if (Auth::id()) {
          $data= appointment::where('id',$id)->get();
        $doctorinfo = add_doctor::all();
        return view('user.edit_myappointment',compact('data','doctorinfo'));
        }
        return redirect()->back();
        
    }
    public function edit_myappointment(Request $req)
    {
        if (Auth::id()) {
             $req->validate([
            
        'user_name' => 'required|max:255',
        'user_email' => 'required|max:255',
        'appointment_time' => 'required',
        'user_phoneNo' => 'required|max:255',
        'speciality' => 'required|max:255',
        'message' => 'required|max:255',          
        ]);

        }
        $data= new appointment();
        $id = $req->id;
          if(Auth::id()){
            $user_id=Auth::user()->id;
            $user_name=$req->user_name;
            $user_email=$req->user_email;
            $appointment_time=$req->appointment_time;
            $user_phoneNo=$req->user_phoneNo;
            $speciality=$req->speciality;
            $message=$req->message;
          $data = appointment::where('id',$id)->update(['user_id'=>$user_id ,'user_name'=>$user_name,'user_email'=>$user_email ,'appointment_time'=>$appointment_time,'user_phoneNo'=>$user_phoneNo,'speciality'=>$speciality,'message'=>$message]);
        if($data){
            return back()->with('success','Congrats your appointment has be update');
        }else{
          return back()->with('fail','Soory your appointment has not be update');  
        }
          }
          return back()->with('fail','Please Login first then you can take appointment'); 
    }
}
