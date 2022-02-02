<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.navbar')




        <div >
            <br><br><br>
            {{--@if($message = Session::get('message'))--}}
            {{--<div class="alert alert-warning alert-dismissible fade show" role="alert">--}}
            {{--<strong>{{$message}}!</strong>--}}
            {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
            {{--<span aria-hidden="true">&times;</span>--}}
            {{--</button>--}}
            {{--</div>--}}
            {{--@endif--}}
            <table class=" max-w-6xl table  table-bordered table-hover bg-light" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Authorname</th>
                    <th>date</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $blog)
                    <tr>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->description}}</td>
                        <td>{{$blog->authorname}}</td>
                        <td>{{$blog->date}}</td>
                        <td><img src="blogimage/{{$blog->image}}" alt="" height="70" width="100"></td>
                        <td><a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger" href="{{url('deleteblog',$blog->id)}}">Delete</a>
                            <a class="btn btn-success" href="{{url('updateblog',$blog->id)}}">Edit</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>






    </div>
</div>
@include('admin.script')
</body>
</html>