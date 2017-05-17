@extends('layouts.app')

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
                <div class="blog-grid itemsz col-sm-12 col-md-3 no-padding" style="margin-top: 20px;">
                    <div class="blog-img-thumb">
                        <img class="img-responsive" src="{{getUploadsPath($row['image'])}}">
                    </div>
                    <div class="col-md-12">
                    <h4>
                        <a href="{{route('showBlogPostDetail',['post_id'=>$row['id']])}}"
                           class="bloghead">{{$row['title']}}</a>
                    </h4>
                    <p>
                        {!! $row['description'] !!}...
                    </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<br>
<br>
<br>
<br>
<br>
<br>

@endsection