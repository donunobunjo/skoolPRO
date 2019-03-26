@extends('Dashboard.layouts.app') 
@section('content')

<section class="content-header">
    <h1>
        DASHBOARD
        <small>
            <!--View Sessions and add new Sessions-->
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Administrator</a>
        </li>
        <li class="active">Setup</li>
        <li class="active">Sessions</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <!--Sessions-->
            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <!--Start creating your amazing application!-->


            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1>Sessions</h1>
                                <h3 id = "updateMessage" style="color:green;text-align:center;"></h3>
                            </div>

                            <div class="panel-body">
                                <!--<h1> 
                   if (session('status'))
                        <div class="alert alert-success">
                             session
                        </div>
                    endif
                    </h1>
                    You are logged in!-->
                                <div class="table table-responsive">
                                    <table class="table table-bordered table-striped" id="table">
                                        <thead>
                                            <tr>
                                                <!--<th width="150px">S/No.</th>-->
                                                <th class="text-center"  width="200px" >Session</th>
                                                <th class="text-center" width="150px">
                                                    <!-- <a href="#" id="showModalCreate" class="create-session btn btn-success btn-md" data-toggle="modal" data-target="#modalCreate" data-backdrop="static" data-keyboard="false">-->
                                                    <a href="#" id="showModalCreate" class="create-session btn btn-success btn-md">
                                                        <i class="fa fa-plus"></i>New Session
                                                    </a>

                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="session-list" name="session-list">
                                            {{csrf_field()}}
                                            <?php
                                $no=1;
                            ?>
                                                @foreach($sess as $key=>$value)
                                                <!---<tr class="session{{$value->id}}">-->
                                                <tr id="session{{$value->id}}">
                                                    <!-- <td>{{$no++}}</td>-->
                                                    <!--<td>{{$value->id}}</td>-->
                                                    <td class="text-center" >{{$value->Session}}</td>
                                                    <td>
                                                        <a href="#" class="show-session btn btn-info btn-sm" data-id="{{$value->id}}" data-session="{{$value->Session}}" value="{{$value->id}}">
                                                            <i class="fa fa-eye"></i>
                                                            View
                                                        </a>
                                                        <a href="#" class="edit-session btn btn-warning btn-sm" data-id="{{$value->id}}" data-session="{{$value->Session}}" value="{{$value->id}}">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <a href="#" class="delete-session btn btn-danger btn-sm" data-id="{{$value->id}}" data-session="{{$value->Session}}" value="{{$value->id}}">
                                                            <i class="glyphicon glyphicon-trash"></i>
                                                            Delete
                                                        </a>
                                                    </td>

                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!--New session Modal -->

        <div class="modal fade" id="modalCreate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">New Session</h4>
                        <p><h3 id="savedMessage" style="text-align:center;color:green;"></h3></p>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="createSessionForm">
                            <div class="form-group row add">
                                <label for="session" class="control-label col-sm-2">Session :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="session" name="session" placeholder="Enter Session" required autofocus>
                                    <span class="help-block session-error red"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveSession">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- New Session Modal End -->





        <!--View session Modal -->

        <div class="modal fade" id="modalView">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">View Session</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="viewSessionForm">

                            <div class="form-group row add">
                                <label for="session" class="control-label col-sm-2">Session :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="sessionview" name="session" required autofocus disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- View Session Modal End -->



        <!--Update Session Modal starts -->
        <div class="modal fade" id="modalUpdate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Session</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="updateSessionForm">
                            <div class="form-group row add">
                                <label for="session" class="control-label col-sm-2">Session :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="updatesessionText" name="updatesession" required autofocus>
                                    <span class="help-block session-error red"></span>
                                </div>
                            </div>
                            <input type="hidden" name="sessID" id = "sessID">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateSession">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Update session modal end -->
        
        
        
        
        <!-- /.box-body -->
        <div class="box-footer">
            <!-- Footer-->
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
@endsection 

@section('scripts')
<script type="text/javascript">

    $(document).ready(function () {
        //Display the create session modal form
       // alert('yipeeeeeeeee!!!!!!!!!!!!!');
        $('#showModalCreate').click(function () {
            $('#createSessionForm').trigger("reset");
            $('.session-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            $('#modalCreate').modal({ backdrop: 'static', keyboard: false });
        });

        //Save the session
        $('#saveSession').click(function (e) {
            $('.session-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            var session = $('#session').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '/session',
                data: { session: session },
                dataType: 'json',
                success: function (data) {
                    var session = '<tr id="session' + data.id + '"><td class="text-center">' + data.Session + '</td>';
                    session += '<td><a href="#" class="show-session btn btn-info btn-sm" data-id="' + data.id + '" data-session="' + data.Session + '"><i class="fa fa-eye"></i>View</a> ';
                    session += '<a href="#" class="edit-session btn btn-warning btn-sm" data-id="' + data.id + '" data-session="' + data.Session + '"><i class="fa fa-edit"></i>Edit</a> ';
                    session += '<a href="#" class="delete-session btn btn-danger btn-sm" data-id="' + data.id + '" data-session="' + data.Session + '"><i class="glyphicon glyphicon-trash"></i>Delete </a></td></tr>';
                    $('#session-list').append(session);
                    $('#createSessionForm').trigger("reset");
                    $('#savedMessage').html("New session saved successfully")
                },
                error: function (data) {
                    if (data.status === 422) {
                        
                        $.each(data.responseJSON.errors, function (key, value) {
                            $('.' + key + '-error').html(value);
                        });
                    } else {
                        // Error
                        // Incorrect credentials
                        // alert('Incorrect credentials. Please try again.')
                        // alert('yipeeeeee');
                    }
                }
            });
        });


        // Display the View session modal form
        $('body').on('click', '.show-session', function () {
            $('#modalView').modal({ backdrop: 'static', keyboard: false });
            $('#sessionview').val($(this).attr("data-session"));
            $('#sno').val($(this).attr("data-id"));
            $('.session-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
        });

        // Delete a session
        $('body').on('click', '.delete-session', function () {
            $('.session-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            var sessName;
            sessName = $(this).attr("data-session");
            if (confirm("Are you sure you want to delete this sesssion:   " + sessName)) {
                var sessionid = $(this).attr("data-id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: 'session/' + sessionid,
                    success: function (data) {
                        $("#session" + sessionid).remove();
                        $('#updateMessage').html("Session deleted successfully");
                    },
                    error: function (data) {
                       // console.log('Error:', data);
                    }
                });
            }
            else {
                return false;
            }
        });


        // Edit/Update a session
        $('body').on('click', '.edit-session', function () {
            $('#modalUpdate').modal({ backdrop: 'static', keyboard: false });
            $('#updatesessionText').val($(this).attr("data-session"));
            $('#sessID').val($(this).attr("data-id"));
            $('.session-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
        });



        //Saving the update to session
        $('#updateSession').click(function (e) {
            $('.session-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            var sessionid = $('#sessID').val();
            var session = $('#updatesessionText').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            $.ajax({
                type: "PUT",
                url: '/session/' + sessionid,
                data: { session: session },
                dataType: 'json',
                success: function (data) {
                    var session = '<tr id="session' + data.id + '"><td class="text-center">' + data.Session + '</td>';
                    session += '<td><a href="#" class="show-session btn btn-info btn-sm" data-id="' + data.id + '" data-session="' + data.Session + '"><i class="fa fa-eye"></i>View</a> ';
                    session += '<a href="#" class="edit-session btn btn-warning btn-sm" data-id="' + data.id + '" data-session="' + data.Session + '"><i class="fa fa-edit"></i>Edit</a> ';
                    session += '<a href="#" class="delete-session btn btn-danger btn-sm" data-id="' + data.id + '" data-session="' + data.Session + '"><i class="glyphicon glyphicon-trash"></i>Delete </a></td></tr>';
                    $("#session" + sessionid).replaceWith(session);
                    $('#updateMessage').html("Session update successfully");
                    $("#modalUpdate").modal("hide");
                },
                error: function (data) {
                    if (data.status === 422) {
                        $.each(data.responseJSON.errors, function (key, value) {
                            $('.' + key + '-error').html(value);
                        });
                    } else {
                        
                    }
                }
            });
        });
    });
</script> 
@endsection