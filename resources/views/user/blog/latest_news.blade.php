<div class="page-section bg-light">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Latest News</h1>
        <div class="row mt-5">

            @foreach($blog as $blogs)
            <div class="col-lg-4 py-2 wow zoomIn">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-category">
                            <a href="#">Covid19</a>
                        </div>
                        <a href="{{url('blog_detels',$blogs->id)}}" class="post-thumb">
                            <img src="blogimage/{{$blogs->image}}" alt="">
                        </a>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="{{url('blog_detels',$blogs->id)}}">{{$blogs->title}}</a></h5>
                        <div class="site-info">
                            <div class="avatar mr-2">
                                <div class="avatar-img">
                                    <img src="../assets/img/person/person_1.jpg" alt="">
                                </div>
                                <span>{{$blogs->authorname}}</span>
                            </div>
                            <span class="mai-time"></span> {{$blogs->date}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center mt-4 wow zoomIn">
                <a href="{{url('bloghome')}}" class="btn btn-primary">Read More</a>
            </div>

        </div>
    </div>
</div> <!-- .page-section -->
