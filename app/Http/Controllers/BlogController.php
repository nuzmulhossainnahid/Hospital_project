<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blogcomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog');
    }
    public function addblog(Request $request)
    {
        $blog = new Blog();
        $image = $request->image;
        $imagename=time().'.'.$image->getClientoriginalExtension();

        $request->image->move('blogimage',$imagename);
        $blog->image=$imagename;

        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->authorname=$request->authorname;
        $blog->date=$request->date;

        $blog->save();
        return redirect()->back()->with('message','Blog Added Successfully');


    }

    public function showblog()
    {
        if (Auth::id())
        {
            if (Auth::user()->usertype==1)
            {
                $data = Blog::all();
                return view('admin.showblog',compact('data'));

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
    public function deleteblog($id)
    {
        $data = Blog::find($id);
        $data->delete();

        return redirect()->back();
    }
    public function updateblog($id)
    {
        $data = Blog::find($id);
        return view('admin.updateblog',compact('data'));
    }

    public function editblog(Request $request,$id)
    {
        $blog = Blog::find($id);
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->authorname=$request->authorname;
        $blog->date=$request->date;

        $image=$request->image;

        if ($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('blogimage',$imagename);
            $blog->image=$request->$imagename;
        }

        $blog->save();

        return redirect()->back()->with('message','Doctor Information Update Successfully');
    }

    public function blogdetels($id)
    {
        $data = Blog::find($id);
        $data->all();
        return view('user.blog.detalsblog',compact('data'));

    }
    public function bloghome()
    {
        $data = Blog::all();
        return view('user.blog.blog',compact('data'));
    }

    public function blogcomment(Request $request)
    {
        $data = new Blogcomment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->website = $request->website;
        $data->message = $request->message;

        $data->save();

        return redirect()->back()->with('message','Your Message Send Successfully');
    }


}
