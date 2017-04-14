@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">
                        Blog
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
                            <div class="img-publicacion-home">
                                <img class="img-responsive" src="{{getUploadsPath($row['image'])}}">
                            </div>

                            <div class="contenido-publicacion-home">
                                <a href="{{route('showBlogPostDetail',['post_id'=>$row['id']])}}" class="bloghead" >{{$row['title']}}</a>


                                <p class="blogtext">{{$row['description']}} </div>
                            <div class="mascara-enlace-blog-home">
                                <span>Lorem and his option </span>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>


@endsection