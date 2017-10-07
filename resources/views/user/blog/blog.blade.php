@extends('layouts.app')
@section('title')
    Gamithon Blog
@stop
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center" style="color: #F9960E;">
                        Blogs
                    </h1>
                    <hr class="light full">

                </div>
            </div>
        </div>
    </section>
    <section class="publicaciones-blog-home no-padding">
        <div class="container">
            <div class="">
                <div class="row-page col-md-12 no-padding">
                    @foreach($posts as $row)
                        <div class=" col-sm-12 col-md-3 no-padding" style="margin-top: 20px;">
                            <div class="itemsz grid-content-container">
                                <div class="blog-img-thumb">
                                    <img class="img-responsive" src="{{getUploadsPath($row['image'])}}">
                                </div>
                                <div class="col-md-12">
                                    <h4>
                                        <a href="{{route('showBlogPostDetail',['post_id'=>$row['slug']])}}"
                                           class="bloghead">{{$row['title']}}</a>
                                    </h4>
                                    <p>
                                        {!! str_limit($row['description'], 100) !!}...
                                    </p>
                                    <p>
                                        <a href="{{route('showBlogPostDetail',['post_id'=>$row['slug']])}}">Read
                                            More</a>
                                    </p>
                                </div>
                                <div class="clear clearfix"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script type="application/ld+json">

{
    "@context": "http://schema.org",
    "@type": "Blog",
    "url": "http://gamithonfantasy.com/blog"
}

    </script>
@endsection