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
                                    <th class="border-r">replies</th>
                                    <th class="border-r">action</th>

                                </tr>
                                </thead>
                                <tbody id="selected-player" class="main-taible-body">
                                @foreach($posts['posts'] as $post)
                                    <tr>
                                        <td class="border-r1" style="min-width: 305px;">


                                                <a href="{{route('categoryposts',['id'=>$post['id']])}}"> {{$post['title']}}</a>


                                        </td>
                                        <td id="border-r1-{{$post['id']}}" class="border-r1-{{$post['id']}}" style="min-width: 305px;">


                                                {{$post['description']}}



                                        </td>
                                        <td>
                                            @foreach($post['replies'] as $row)
                                                {{$row['user_id']}} <br>
                                            {!! $row['post_text'] !!}<br>
                                                {!! $row['created_at'] !!}


                                                @endforeach
                                        </td>


                                        <td class="border-r1" style="min-width: 305px;">
                                            <button  type="button" id="1" data-id="{{$post['id']}}"  data-toggle="modal"
                                                     data-target="#myModal" class="open-AddBookDialog">Comment</button>
                                            <button  type="button" id="1" data-id="{{$post['id']}}"  data-toggle="modal"
                                                     data-target="#myModal" class="open-AddBookDialog">Reply</button>


                                        </td>
                                        {{--<td>--}}
                                            {{--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>--}}
                                        {{--</td>--}}
                                        <td>

                                        </td>



                                    </tr>

                                @endforeach

                                </tbody>
                            </table>




                        </div>

                        <!-- Modal content-->
                        <div id="myModal" class="modal fade in" role="dialog">
                            <div class="modal-dialog">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="modal-content">
                                    <div style='background-color: #009900;' class="modal-header">
                                        <h4 class='modal-title' style="color:#fff;">
                                            Message?
                                        </h4>
                                    </div>

                            <div class="modal-body" >

                                {!! Form::open(['url' => route('reply'),'method'=>'POST']) !!}
                                <div class="form-group">
                                    <textarea name="post_text" id="post-data"
                                              style="height:200px;" class="form-control wysiwyg"></textarea>
                                </div>

                                <input type="hidden" id="post_id" name="post_id" value=""/>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Post</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                             </div>
                            </div>
                        </div>

                        </div>
                        <!-- end model content -->


                    </div>
                </div>
            </div>
        </div>
        <br> <br> <br> <br> <br> <br> <br><br> <br> <br><br> <br><br> <br>
    </section>
@endsection
@section('js')

    <script>
        jQuery.ajaxSetup({async:false});
        $(document).on("click", ".open-AddBookDialog", function () {
            var postId=$(this).data('id');

            var liopo='border-r1-'+postId;
          var t=($("#"+liopo).text());
        alert(t);
        //  alert(t);

            $(".modal-body #post-data").text("zulfiqar tariq is good");
            $(".modal-body #post_id").val(postId);




        });
    </script>

    {!! Html::script('js/tinymce/tinymce.min.js'); !!}
    {!! Html::script('js/tinymce.js');!!}
    @endsection

