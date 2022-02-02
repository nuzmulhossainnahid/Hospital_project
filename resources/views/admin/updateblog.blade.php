<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.navbar')


        <div class="container-fluid pt-5">


            <form action="{{url('editblog',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-6">
                    @if(session()->has('message'))
                        <div class="alert alert-success mt-3">
                            {{session()->get('message')}}
                        </div>

                    @endif

                    <div class="form-group mt-2">
                        <label >Title</label>
                        <input  style="color: black" type="text" class="form-control" value="{{$data->title}}" name="title">
                    </div>
                    <div class="form-group mt-2">
                        <label >Description</label>
                        <input  style="color: black" type="text" class="form-control" value="{{$data->description}}" name="description">
                    </div>

                    <div class="form-group">
                        <label >Author Name</label>
                        <input style="color: black" type="text" class="form-control" value="{{$data->authorname}}" name="authorname">
                    </div>

                    <div class="form-group">
                        <label >date</label>
                        <input  style="color: black" type="date" class="form-control" value="{{$data->date}}" name="date">
                    </div>

                        <div class="form-group">
                            <label >Old Image</label>
                            <img width="200" height="200" src="blogimage/{{$data->image}}" alt="">
                        </div>

                    <div class="form-group">
                        <label >New Image</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>

                    <div class="form-group">
                        <label></label>
                        <input type="submit" class="form-control btn btn-success">
                    </div>
                </div>
            </form>
        </div>




    </div>
</div>
@include('admin.script')
</body>
</html>