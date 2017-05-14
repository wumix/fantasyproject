@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Games
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$game_types['type_name']}} Stats</h3>
                    </div>
                    <div class="box-body">
                        @include('adminlte::layouts.form_errors')
                        {!! Form::open(['url' => route('postAddGameStat',['game_id'=>$game_id])]) !!}
                        <?php $cat_id = 0; ?>


                       <?php $i=0;?>
                        @foreach($game_types['game_type_stats_category'] as $key=>$category)
                            <h3 class="box-title">{{$category['name']}}</h3>
                            @foreach($category['game_type_stats'] as $key=>$names)
                                <div class="form-group">
                                    <input  type="hidden" name="name[{{$i}}][prime_id]" value="{{$names['id']}}" type="text"/>
                                    <input  type="hidden" name="name[{{$i}}][id]" value="{{$category['id']}}" type="text"/>
                                    <input required name="name[{{$i}}][name]" value="{{$names['name']}}" type="text"/>


                                </div>
                                <?php $i++;?>
                            @endforeach
                            <div class="form-group">
                                <input id="{{$category['id']}}" type="hidden" value="{{$category['id']}}"/>
                                <input onclick="test(this.id)" id="{{$category['id']}}" class="btn btn-success" type="button"
                                       value="add_more"/>
                            </div>

                        @endforeach
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <input type="hidden" id="valueofi" value="{{$i}}">
                    <!-- /.box-body -->


                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function test(id) {
            var valueofi=$('#valueofi').val();


            var html="";
            html+= '<input type="hidden" name="name['+valueofi+'][prime_id]" placeholder="Enter Term name" "/>';
               html+= '<input required type="text" name="name['+valueofi+'][name]" placeholder="Enter Term name" "/>';
            html+= '<input type="hidden" name="name[' + valueofi+ '][id]" value="'+id+'" placeholder="Enter Term name" "/>';
            valueofi++;
            $('#valueofi').val(valueofi);


            $(html).insertBefore('#' + id);


            return false;
        }

    </script>
@endsection