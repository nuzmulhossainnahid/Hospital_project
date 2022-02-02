<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.css.style')
</head>
<body>

<!-- Back to top button -->
<div class="back-to-top"></div>

@include('user.include.header')

<table class="table table-hover">
    <thead>
    <tr align="center">
        <th scope="col">Doctor Name</th>
        <th scope="col">Date</th>
        <th scope="col">Message</th>
        <th scope="col">Status</th>
        <th scope="col">Cancel Appointment</th>
    </tr>
    </thead>
    <tbody>

    @foreach($appoint as $appoints)
    <tr align="center">
        <th >{{$appoints->doctor_name}}</th>
        <td>{{$appoints->date}}</td>
        <td>{{$appoints->message}}</td>
        <td>@if($appoints->status=='Approved')
                <span class="bg-success">{{$appoints->status}}</span>
            @elseif($appoints->status=='Canceled')
                <span class="bg-danger">{{$appoints->status}}</span>
            @else
                <span class="bg-warning">{{$appoints->status}}</span>
            @endif

        </td>
        <td align="center"><a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')" href="{{url('cancel_appoint', $appoints->id)}}">Cancel</a> </td>
    </tr>
        @endforeach

    </tbody>
</table>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>

</body>
</html>