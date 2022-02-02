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
                    <th>Doctor Name</th>
                    <th>Phone</th>
                    <th>Speciality</th>
                    <th>Room No</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $doctor)
                    <tr>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->phone}}</td>
                        <td>{{$doctor->speciality}}</td>
                        <td>{{$doctor->room}}</td>
                        <td><img src="doctorimage/{{$doctor->image}}" alt="" height="70" width="100"></td>
                        <td><a onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger" href="{{url('deletedoctor',$doctor->id)}}">Delete</a>
                            <a class="btn btn-success" href="{{url('updatedoctor',$doctor->id)}}">Edit</a></td>
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