<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    @include('admin.css')

</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.navbar')
        {{--Body--}}

        <div class="container-fluid pt-5">


            <form action="{{url('add_blog')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-6">
                    @if(session()->has('message'))
                        <div class="alert alert-success mt-3">
                            {{session()->get('message')}}
                        </div>

                    @endif

                    <div class="form-group mt-2">
                        <label >Title</label>
                        <input  style="color: black" type="text" class="form-control" name="title">
                    </div>
                        <div class="form-group mt-2">
                            <label >Description</label>
                            <input  style="color: black" type="text" class="form-control" name="description">
                        </div>

                    <div class="form-group">
                        <label >Author Name</label>
                        <input style="color: black" type="text" class="form-control" name="authorname">
                    </div>

                    <div class="form-group">
                        <label >date</label>
                        <input  style="color: black" type="date" class="form-control" name="date">
                    </div>


                    <div class="form-group">
                        <label >Image</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>

                    <div class="form-group">
                        <label></label>
                        <input type="submit" class="form-control btn btn-success">
                    </div>
                </div>
            </form>
        </div>
        {{--End Body--}}
    </div>
</div>
@include('admin.script')
</body>
</html>