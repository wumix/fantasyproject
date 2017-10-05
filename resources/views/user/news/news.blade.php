@extends('layouts.app')
@section('title')
    Gamithon News
@stop
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center" style="color: #F9960E;">
                        {!! $blogTitle !!}
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
                        <div class="itemsz col-sm-12 col-md-3 no-padding" style="margin-top: 20px;">
                            <div class="itemsz grid-content-container">
                                <div class="blog-img-thumb">
                                    <img class="img-responsive" src="{{getUploadsPath($row['image'])}}">
                                </div>
                                <div class="col-md-12">
                                    <h4>
                                        <a href="{{route('newsdetail',['post_id'=>$row['slug']])}}"
                                           class="bloghead">{{$row['title']}}
                                        </a>
                                    </h4>
                                    <p class="kill">
                                        {!! str_limit($row['description'], 100) !!}...
                                    </p>
                                    <p>
                                        <a href="{{route('newsdetail',['id'=>$row['slug']])}}">Read More</a>
                                    </p>
                                </div>
                                <div class="clear clearfix"></div>
                            </div>
                        </div>

                    @endforeach
                    <div class="text-center"> {{$posts->links()}} </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script type="application/ld+json">

{
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "url": "https://gamithonfantasy.com/news",
    "author":"gamithonfantasy.com",
    "headline":"gamithonfantasy.com",
    "image":"http://www.gamithonfantasy.com/uploads/source/evinlewis.jpg",
    "dateModified":"2017-10-05",
    "mainEntityOfPage":"gamithonfantasy.com",
    "datePublished":"2017-10-05",
    "publisher":"gamithon fantasy"

}

    </script>
    <script>
        $(function () {
            $('.itemsz').matchHeight('col-md-4');
            $('.kill').matchHeight('kill');
        });
    </script>

@stop

