<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid ">
        @include('admin.navbar')
        <div class="">
            <br>
            <br>
            <br>


            <div class="table-responsive max-w-6xl">
            <table class="table  table-bordered table-hover bg-light">
                <thead>
                <tr>
                    <th >Paticent Name</th>
                    <th >Email</th>
                    <th >phone</th>
                    <th >Doctor Name</th>
                    <th >Message</th>
                    <th >Status</th>
                    <th >Approve</th>
                    <th >Cancel</th>
                    <th >Send Mail</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $appoint)
                    <tr align="center">
                        <th >{{$appoint->name}}</th>
                        <td>{{$appoint->email}}</td>
                        <td>{{$appoint->phone}}</td>
                        <td>{{$appoint->doctor_name}}</td>
                        <td>{{$appoint->message}}</td>
                        <td>{{$appoint->status}}</td>
                        <td><a class="btn btn-success"  href="{{url('approved', $appoint->id)}}">A</a> </td>
                        <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')" href="{{url('canceled', $appoint->id)}}">C</a> </td>
                        <td><a class="btn btn-success"  href="{{url('emailview', $appoint->id)}}">Mail</a> </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            </div>
        </div>
        </div>

</div>
@include('admin.script')
</body>
</html>