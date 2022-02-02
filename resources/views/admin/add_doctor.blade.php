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


        <form action="{{url('upload_doctor')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-6">
                @if(session()->has('message'))
                    <div class="alert alert-success mt-3">
            {{session()->get('message')}}
                            </div>

                @endif

            <div class="form-group mt-2">
                <label >Doctor Name</label>
                <input  style="color: black" type="text" class="form-control" name="name" placeholder="Write Doctor Name">
            </div>

            <div class="form-group">
                <label >Phone</label>
                <input style="color: black" type="text" class="form-control" name="phone" placeholder="Write Phone">
            </div>

            <div class="form-group">
                <label >Speciality</label>
                <select style="color: black" class="form-control" name="speciality">
                    <option>--Select--</option>
                    <option value="skin">Skin</option>
                    <option value="heart">Heart</option>
                    <option value="eye">Eye</option>
                    <option value="nose">Nose</option>

                </select>
            </div>

            <div class="form-group">
                <label >Room No</label>
                <input  style="color: black" type="text" class="form-control" name="room" placeholder="Write Phone">
            </div>


            <div class="form-group">
                <label >Doctor Image</label>
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