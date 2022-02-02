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


            <form action="{{url('edit_doctor',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-6">
                    @if(session()->has('message'))
                        <div class="alert alert-success mt-3">
                            {{session()->get('message')}}
                        </div>

                    @endif

                    <div class="form-group mt-2">
                        <label >Doctor Name</label>
                        <input  style="color: black" type="text" class="form-control" name="name" value="{{$data->name}}">
                    </div>

                    <div class="form-group">
                        <label >Phone</label>
                        <input style="color: black" type="text" class="form-control" name="phone" value="{{$data->phone}}">
                    </div>

                    <div class="form-group">
                        <label >Speciality</label>
                        <select style="color: black" class="form-control" name="speciality">
                            <option>{{$data->speciality}}</option>
                            <option value="skin">Skin</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                            <option value="nose">Nose</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label >Room No</label>
                        <input  style="color: black" type="text" class="form-control" name="room" value="{{$data->room}}">
                    </div>
                        
                        <div class="form-group">
                            <label >Old Image</label>
                            <img width="200" height="200" src="doctorimage/{{$data->image}}" alt="">
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




    </div>
</div>
@include('admin.script')
</body>
</html>