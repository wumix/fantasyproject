@extends('layouts.app')
@section('title')
    {{--{{dd($posts->toArray())}}--}}
@stop
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Posts
                    </h1>
                    <hr class="light full">
                    <div class="page-content" style="margin-bottom: 80px;">


                        <!-- your content -->

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped ">
                                <thead class="main-taible-head">
                                <tr>

                                    <th class="border-r">Title</th>
                                    <th class="border-r">Description</th>
                                    <th class="border-r">action</th>

                                </tr>
                                </thead>
                                <tbody id="selected-player" class="main-taible-body">
                                @foreach($posts['posts'] as $post)



                                    <tr>
                                        <td class="border-r1" style="min-width: 305px;">

                                            <h5>
                                                <a href="{{route('categoryposts',['id'=>$post['id']])}}"> {{$post['title']}}</a>
                                            </h5>

                                        </td>
                                        <td class="border-r1" style="min-width: 305px;">

                                            <h5>
                                                <a href="{{route('categoryposts',['id'=>$post['id']])}}"> {{$post['description']}}</a>
                                            </h5>

                                        </td>
                                        <td class="border-r1" style="min-width: 305px;">

                                            <button id="btnDialog" onclick="game()" class="btn btn-success">Reply</button>

                                        </td>
                                        <td>

                                        </td>



                                    </tr>

                                @endforeach

                                </tbody>
                            </table>

                            {!! Form::open(['url' => 'foo/bar', 'method' => 'put'])  !!}
                            <div class="form-group">
                                <label>Enter Content in English </label>
                                <textarea required class="form-control wysiwyg" rows="3" placeholder="Post" name="content"></textarea>
                            </div>
                            {!! Form::close() !!}



                        </div>
                        <!-- your content -->


                    </div>
                </div>
            </div>
        </div>
        <br> <br> <br> <br> <br> <br> <br><br> <br> <br><br> <br><br> <br>
    </section>
@endsection
@section('js')
    <script>
        function game() {
            $('#btnDialog').click(function () {
                alert('hello');
            });
        }
    </script>

    {!! Html::script('js/tinymce/tinymce.min.js'); !!}
    {!! Html::script('js/tinymce.js');!!}
    @endsection

