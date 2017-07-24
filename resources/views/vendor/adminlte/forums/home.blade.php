@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Lists

@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">List of Unapproved Posts</h3>
                        <span class="pull-right">

                    </span>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>action</th>
                                    <th></th>
                                </tr>
                                @foreach($lists as $row)
                                    <tr>

                                        <td>

                                            {{$row['name']}}
                                        </td>
                                        <td>
                                            {{$row['description']}}
                                        </td>
                                        <td>
                                            <form>
                                                <input name="post_id" value="{{$row['id']}}" type="hidden" class="post_id_approve"/>
                                            <select id="is_approve" class="is_approve" name="is_approved">
                                                <option
                                                        @if($row['is_approved']==0)
                                                                selected
                                                                @endif

                                                        value="0">Un appproved</option>
                                                <option  @if($row['is_approved']==1)
                                                         selected
                                                         @endif
                                                         value="1">Approved</option>

                                            </select>
                                            </form>

                                        </td>



                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        {{$lists->links()}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

        $('.is_approve').change(function () {
         return confirm("Are you sure");
           var t= $(this).parent().children().val();
           $.ajax({
                type: 'POST',
                url: '{{route('approve')}}',
                data: {
                    is_approved: $(this).val(),
                    post_id:t,
                    _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    if (data.success == true) {

                }

        }
        });
        });
    </script>

    @endsection
