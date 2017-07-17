@extends('layouts.app')
@section('title')

@stop
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-heading">
                        Categories
                    </h1>
                    <hr class="light full">
                    <div class="page-content" style="margin-bottom: 80px;">


                        <!-- your content -->

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped ">
                                <thead class="main-taible-head">
                                <tr>

                                    <th class="border-r">Categories</th>
                                    {{--<th class="border-r">Points Required To Play</th>--}}

                                </tr>
                                </thead>
                                <tbody id="selected-player" class="main-taible-body">
                                @foreach($categories as $cat)

                                    <tr>
                                        <td class="border-r1" style="min-width: 305px;">

                                            <h5><a href="{{route('')}}"> {{$cat['name']}}</a></h5>

                                        </td>


                                    </tr>

                                @endforeach
                                </tbody>
                            </table>


                        </div>
                        <!-- your content -->


                    </div>
                </div>
            </div>
        </div>
        <br> <br> <br> <br> <br> <br> <br><br> <br> <br><br> <br><br> <br>
    </section>
@endsection
