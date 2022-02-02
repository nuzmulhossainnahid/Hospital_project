<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <base href="/public">
    @include('admin.css')

</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.navbar')
        Body

        <div class="container-fluid pt-5">


            <form action="{{url('sendemail',$data->id)}}" method="post" >
                @csrf
                <div class="mt-6">
                    @if(session()->has('message'))
                        <div class="alert alert-success mt-3">
                            {{session()->get('message')}}
                        </div>

                    @endif

                    <div class="form-group mt-2">
                        <label >Greeting</label>
                        <input  style="color: black" type="text" class="form-control" name="greeting" placeholder="Write Doctor Name">
                    </div>

                    <div class="form-group">
                        <label >Body</label>
                        <input style="color: black" type="text" class="form-control" name="body" placeholder="Write Phone">
                    </div>


                    <div class="form-group">
                        <label >Action Text</label>
                        <input  style="color: black" type="text" class="form-control" name="actiontext" placeholder="Write Phone">
                    </div>

                        <div class="form-group">
                            <label >Action Url</label>
                            <input  style="color: black" type="text" class="form-control" name="actionurl" placeholder="Write Phone">
                        </div>

                        <div class="form-group">
                            <label >End Part</label>
                            <input  style="color: black" type="text" class="form-control" name="endpart" placeholder="Write Phone">
                        </div>




                    <div class="form-group">
                        <label></label>
                        <input type="submit" class="form-control btn btn-success">
                    </div>
                </div>
            </form>
        </div>
        End Body
    </div>
</div>
@include('admin.script')
</body>
</html>