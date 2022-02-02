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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Message</th>
                    <th>Replay</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $comment)
                    <tr>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->website}}</td>
                        <td>{{$comment->message}}</td>
                        <td><a href="{{url('emailviewcomment', $comment->id)}}" class="btn btn-success">Replay</a></td>
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