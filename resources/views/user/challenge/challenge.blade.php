@extends('layouts.app')
@section('title')
    Challenge
@stop
@section('css')
    <style>
        .challenge_section {
            width: 100%;
            box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.21);
            margin-bottom: 50px;
        }

        .label_challnge_sec {
            width: 590px;
            display: block;
            border: 1px solid #dfdddd;
            margin: 0px auto;
            border-radius: 5px;
            background: #f4f2f2;
        }
<<<<<<< HEAD
=======
.centerlize{
    width: 500px;
    display:block;
    margin: 0 auto;
}
>>>>>>> develop

        .sectio_absolute {
            width: 100%;
            display: inline-block;
            position: relative;
            background: #f4f2f2;
        }

        .input_challenge_field {
            width: 93%;
            border: none;
            display: inline-block;
            height: 39px;
            padding-left: 23px;
            color: #939292;
            background: #f4f2f2;
        }

        .serch_challenge {
            display: inline-block;
            position: absolute;
            top: 7px;
            right: 15px;
        }

        .cnter_liez_challenge img {
            width: 100%;
            display: inline-block;
            width: 110px;
            height: 110px;
            line-height: 110px;
            border-radius: 50%;
            border: 7px solid #fff;
            box-shadow: 0px 0px 18px rgba(0, 0, 0, 0.35);
        }

        .challnge_text {
            font-size: 17px;
            color: #232323;
            margin-top: 20px;
            display: inline-block;
            margin-bottom: 15px;
            width: 100%;
        }

        .chalnge_btn_jhon {
            width: 120px;
            display: inline-block;
            background: #92b713;
            border-radius: 6px;
            color: #fff;
            font-size: 13px;
            text-align: center;
            height: 35px;
            line-height: 35px;
        }

        .chalnge_btn_jhon:hover {
            background: #f7a02f;
            color: #fff;
            text-decoration: none;
        }

        .border_arrea {
            border-bottom: 1px solid #c1c1c1;
            display: inline-block;
            padding: 19px 0 30px 0;
        }

        .pagination {
            width: 100%;
            display: inline-block;
            text-align: center;
            padding: 60px 0;
        }

        .img-responsive {
            margin: 0 auto !important;
        }

        .form_area_challenge {
            padding: 40px 0;
        }

        @media all and (min-width: 961px) and (max-width: 1200px) {
            .col-md-4 {
                margin-bottom: 30px;
            }

            .col-md-6 {
                text-align: center;
            }

            .challenge_section {
                text-align: center;
            }

            .form_area_challenge {
                padding: 40px 0;
            }

            .label_challnge_sec {
                margin: 0px auto 0px;
            }
        }

        @media all and (min-width: 768px) and (max-width: 960px) {
            .col-md-4 {
                margin-bottom: 30px;
            }

            .col-md-6 {
                text-align: center;
            }

            .challenge_section {
                text-align: center;
            }

            .form_area_challenge {
                padding: 40px 0;
            }

            .label_challnge_sec {
                margin: 0px auto 0px;
            }
        }

        @media all and (min-width: 100px) and (max-width: 768px) {
            .col-md-4 {
                margin-bottom: 30px;
            }

            .col-md-6 {
                text-align: center;
            }

            .challenge_section {
                text-align: center;
            }

            .form_area_challenge {
                padding: 40px 0;
            }

            .label_challnge_sec {
                margin: 0px auto 0px;
                width: 453px;
            }

            .input_challenge_field {
                padding: 0;
            }
        }

        @media all and (min-width: 100px) and (max-width: 600px) {

        }

        @media all and (min-width: 100px) and (max-width: 480px) {
            .label_challnge_sec {
                margin: 0px auto 0px;
                width: 253px;
            }
        }
    </style>
@endsection
@section('content')
    @include('adminlte::layouts.form_errors')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-heading">
                    Challenge the Players
                </h1>
                <hr class="light full">
            </div>

            <!-- start popup -->
            <!-- Trigger the modal with a button -->
        {{--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>--}}

        <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Send Challenge</h4>
                        </div>
                        <div class="modal-body">

                            {!! Form::open(['url' => route('sendchallenge'),'method'=>'POST']) !!}
                            <div class="form-group">
                                <label>Enter the points you want to challenge</label>
                                <input class="form-control" type="text" name="rewards">
                            </div>
                            <input type="hidden" id="user_2_id" name="user_2_id"/>
                            <input type="hidden" id="user_1_id" name="user_1_id" value="{{Auth::id()}}"/>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send Challenge</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- end popup -->

            <div class="col-md-12">
                <div class=" challenge_section ">
                    <form class="form_area_challenge">
                        <label class="label_challnge_sec">
<<<<<<< HEAD
                            <div class="sectio_absolute">
                                <input type="text" placeholder="Search player by email" class="input_challenge_field">
                                <a href="#" class="serch_challenge"><img class="img-responsive "
                                                                         src={{URL::to('/img/search_challenge.png')}} alt=""/></a>
                            </div>
=======
                            {{--<div class="sectio_absolute">--}}
                            {{--<input type="text" placeholder="Search player by email" class="input_challenge_field">--}}
                            {{--<a href="#" class="serch_challenge"><img class="img-responsive "--}}
                            {{--src={{URL::to('/img/search_challenge.png')}} alt=""/></a>--}}
                            {{--</div>--}}
>>>>>>> develop
                        </label>
                    </form>
                    <?php $i = 0;?>
                    <?php $y = 4;?>
<<<<<<< HEAD
=======

>>>>>>> develop
                    @foreach($users as $key=>$user)
                        @if($i%3==0)
                            <div class="border_arrea">
                                @endif
<<<<<<< HEAD
=======

>>>>>>> develop
                                <div class="col-md-4">
                                    <div class="col-md-6">
                                        <div class="cnter_liez_challenge">
                                            <img class="img-responsive "
                                                 src="{{getUploadsPath($user['user']['profile_pic'])}}" alt=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                    <span class="challnge_text">
                       {{$user['user']['name']}}
                    </span>
                                        <a href="#" data-id=" {{$user['user']['id']}}" data-toggle="modal"
                                           data-target="#myModal" class="open-AddBookDialog">
                                            Challenge Me</a>
                                    </div>
                                </div>

                                @if($y%3==0)
<<<<<<< HEAD
=======

>>>>>>> develop
                            </div>
                        @endif
                        <?php $i++;?>
                        <?php $y++;?>
<<<<<<< HEAD
                    @endforeach


                    <div class="pagination">
                        <img class="img-responsive " src={{URL::to('/img/pagination.png')}} alt=""/>
                    </div>
                </div>
=======

                    @endforeach


                    <div class="text-center centerlize">
                        {{$users->links()}}
                    </div>
                </div>

>>>>>>> develop
            </div>


        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).on("click", ".open-AddBookDialog", function () {

            var myBookId = $(this).data('id');
            $(".modal-body #user_2_id").val(myBookId);

        });
    </script>
@stop