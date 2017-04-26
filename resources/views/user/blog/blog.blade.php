@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center" style="color: #F9960E;">
                    BLOG
                </h1>
                <hr class="light full">

            </div>
        </div>
    </div>
</section>
<section class="publicaciones-blog-home no-padding">
    <div class="container">
        <div class="">
            <div class="row-page row no-padding">

                @foreach($posts as $row)

                <div class="col-page col-sm-4 col-md-3">
                    <div  class="fondo-publicacion-home">



                        <div class="contenido-publicacion-home">
                            
                            <img class="img-responsive" style="height: 200px;" src="{{getUploadsPath($row['image'])}}">
                            <a href="{{route('showBlogPostDetail',['post_id'=>$row['id']])}}" class="bloghead" >{{$row['title']}}</a>
                            <p class="blogtext">{!! $row['description'] !!} 
                        </div>

                            <span style="padding-left: 10px;"></span>
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