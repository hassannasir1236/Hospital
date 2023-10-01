<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\add_doctor;
use App\Models\user;
use App\Models\appointment;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Notification;
use App\Notifications\sendemailnotification;
class admincontroller extends Controller
{
    public function upload_doctor(Request $req)
    {
        // Validator::make($req, [
        //     'doctor_name' => ['required', 'string', 'max:255'],
        //     'doctor_phone' => ['required', 'string', 'max:255'],
        //     'doctor_speciality' => ['required', 'string', 'max:255'],
        //     'doctor_room' => ['required', 'string', 'max:255'],
        //     'image' => ['required', 'string', 'max:255'],
        // ])->validate();
        $req->validate([
            
        'doctor_name' => 'required|max:255',
        'doctor_phone' => 'required|max:255',
        'doctor_speciality' => 'required|max:255',
        'doctor_room' => 'required|max:255',
        'image' => 'required|max:255',          
        ]);
          $data= new add_doctor();
        if($req->file('image')){
           $rand = rand(0000,9999).time();
            $file= $req->file('image');
            $filename= $rand.$file->getClientOriginalName();
            $file-> move(public_path('public/uploadimages'), $filename);
            $data->new_image_name= $filename;
            $data->doctor_name=$req->doctor_name;
            $data->doctor_phone=$req->doctor_phone;
            $data->doctor_speciality=$req->doctor_speciality;
            $data->doctor_room=$req->doctor_room;
            $data->image=$file->getClientOriginalName();
        }
        $data->save();
        if($data){
            return back()->with('success','Congrats your product information is store');
        }else{
          return back()->with('fail','Product is not Store');  
        }
    }
    public function showappointment()
    {
        if (Auth::id()) {
           $data = appointment::all();
        return view('admin.showappointment',compact('data'));
        }
        return redirect()->back();
        
    }
    public function editappointment(Request $req,$id)
    {

       $dalete =  appointment::where('id',$id)->update(['status'=>$req->status]);
        if($dalete){
            return redirect()->back()->with('success','Congrats your appointment has be send to doctor');
        }else{
          return redirect()->back()->with('fail','Product is not Store');  
        }
    }
    public function showdoctor()
    {  
        if (Auth::id()) {
           $data = add_doctor::all();
        return view('admin.showdoctor',compact('data'));
        }
        return redirect()->back();
             
    }
    public function delete_doctor($id)
    {
        $dalete = add_doctor::find($id);
        dd($delete->new_image_name);
         $image_path =asset('../public/uploadimages').'/'.$delete->new_image_name;  
         if(File::exists($image_path)) {
          // File::delete($image_path);
             unlink($image_path);
             $dalete->delete();
          if ($dalete == true) {
        $html = view('admin.showdoctor', compact('dalete'))->render();
        return response()->json([
            'status' => true,
            'html' => $html,
            'message' => 'Coupon code applied successfully.',
        ]);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Something went wrong, please try again',
        ]);
    }
        }
    }
    public function edit_doctor($id)
    {
        if (Auth::id()) {
           $data = add_doctor::find($id);
        return view('admin.Edit_doctor', compact('data'));
        }
        return redirect()->back();
        
    }
    public function edit_doctor_record(Request $req)
    {
            $req->validate([
        'doctor_name' => 'required|max:255',
        'doctor_phone' => 'required|max:255',
        'doctor_speciality' => 'required|max:255',
        'doctor_room' => 'required|max:255',
        'image' => 'required|max:255',          
        ]);
             $id = $req->id; 
        $data= add_doctor::find($id);
         if($req->file('image')){
           $rand = rand(0000,9999).time();
            $file= $req->file('image');
            $filename= $rand.$file->getClientOriginalName();
            $file-> move(public_path('public/uploadimages'), $filename);
            $data->new_image_name= $filename;
            $data->doctor_name=$req->doctor_name;
            $data->doctor_phone=$req->doctor_phone;
            $data->doctor_speciality=$req->doctor_speciality;
            $data->doctor_room=$req->doctor_room;
            $data->image=$file->getClientOriginalName();
        }
        $data->update();
        if($data){
            return back()->with('success','Congrats your product information is store');
        }else{
          return back()->with('fail','Product is not Store');  
        }
    }
    public function showemail($id)
    {
        $data = appointment::find($id);
        return view('/admin/showemail',compact('data'));
    }
    public function sendemail(Request $req)
    {
        $data = user::find($req->id);
       // dd($data);  
        $details= [
            'id'=>$data->id,
            'greeting'=> $req->greeting,
            'body'=> $req->body,
            'actiontext'=> $req->actiontext,
            'actionurl'=> $req->actionurl,
            'endpart'=> $req->endpart,
        ];
    Notification::send($data,new sendemailnotification($details));
            //$data->notify(new sendemailnotification($details));
        //dd($data->notifications);
        return  redirect()->back()->with('success','Congrats your product information is store');
    }
}
