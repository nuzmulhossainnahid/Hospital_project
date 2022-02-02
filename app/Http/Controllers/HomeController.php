<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use PhpParser\Comment\Doc;


class HomeController extends Controller
{
    private $doctor;
    private $blog;

    public function redirect()
    {
        if (Auth::id())
        {
            if (Auth::user()->usertype=='0')
            {
                $doctor = Doctor::all();
                $blog = Blog::all();


                return view('user.home',compact('doctor','blog'));
            }
            else
            {

                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function index()
    {
        if (Auth::id())
        {
            return redirect('home');
        }
        else
        $doctor = Doctor::all();
        $blog = Blog::all();
        return view('user.home',compact('doctor','blog'));
    }
    public function appointment(Request $request)
    {
        $data = new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->doctor_name=$request->doctor_name;
        $data->date=$request->date;
        $data->message=$request->message;
        $data->status='In progress';
        if (Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }

        $data->save();
        return redirect()->back()->with('message', 'Appointment Request Successfully');

    }
    public function myappointment()
    {
        if (Auth::id())
        {
            if (Auth::user()->usertype==0)
            {
                $userid = Auth::user()->id;
                $appoint = Appointment::where('user_id',$userid)->get();
                return view('user.appointment.my_appointment',compact('appoint'));
            }

        }
        else
        {
            return redirect()->back();
        }

    }
    public function cancel($id)
    {
        $data = Appointment::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function alldoctor()
    {
        $doctor=Doctor::all();
        $data = Doctor::all();
        return view('user.doctor.alldoctor',compact('data','doctor'));
    }

    public function contact()
    {
        $doctor =Doctor::all();
        return view('user.contact.contact',compact('doctor'));
    }

    public function about()
    {
        $doctor =Doctor::all();
        return view('user.about.about',compact('doctor'));
    }
}
