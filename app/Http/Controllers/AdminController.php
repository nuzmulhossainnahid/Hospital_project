<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Blogcomment;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Notification;



class AdminController extends Controller
{
    public function addview()
    {
        if (Auth::id())
        {
            if (Auth::user()->usertype==1)
            {
                return view('admin.add_doctor');
            }
            else
            {
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }

    }
    public function upload(Request $request)
    {
        $doctor = new doctor;
        $image = $request->image;
        $imagename=time().'.'.$image->getClientoriginalExtension();

        $request->image->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully');



    }
    public function showappointment()
    {

        if (Auth::id())
        {
            if (Auth::user()->usertype==1)
            {
                $data = Appointment::all();

                return view('admin.showappointment',compact('data'));
            }
            else
            {
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }



    }
    public function approved($id)
    {
       $data = Appointment::find($id);
       $data->status='Approved';
       $data->save();

       return redirect()->back();
    }
    public function canceled($id)
    {
        $data = Appointment::find($id);
        $data->status='Canceled';
        $data->save();
        return redirect()->back();
    }
    public function showdoctor()
    {
        $data = Doctor::all();

        return view('admin.showdoctor',compact('data'));

    }
    public function deletedoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();

        return redirect()->back();
    }
    public function updatedoctor($id)
    {
        $data = Doctor::find($id);
        return view('admin.updatedoctor',compact('data'));
    }
    public function edit_doctor(Request $request,$id)
    {
        $doctor = Doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;

        $image=$request->image;

        if ($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('doctorimage',$imagename);
            $doctor->image=$request->$imagename;
        }

        $doctor->save();

        return redirect()->back()->with('message','Doctor Information Update Successfully');
    }
    public function emailview($id)
    {

        $data = Appointment::find($id);

        return view('admin.emailview',compact('data'));
    }


    public function emailviewcomment($id)
    {

        $data = Blogcomment::find($id);

        return view('admin.emailviewcomment',compact('data'));
    }

    public function sendemail(Request $request,$id)
    {
        $data =Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart,
        ];
        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back()->with('message','Email send is Successfully');
    }

    public function sendemailcomment(Request $request,$id)
    {
        $data =Blogcomment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart,
        ];
        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back()->with('message','Email send is Successfully');
    }

    public function commentblog()
    {
        $data = Blogcomment::all();

        return view('admin.blogcomment',compact('data'));
    }

}

