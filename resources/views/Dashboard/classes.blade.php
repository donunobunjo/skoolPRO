@extends('Dashboard.layouts.app') 
@section('content')

<section class="content-header">
    <h1>
        DASHBOARD
        <small>
            <!--View Classes and add new Class-->
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Administrator</a>
        </li>
        <li class="active">Setup</li>
        <li class="active">Classes</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <!--Classes-->
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
                                <h1>Classes</h1>
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
                                                <th class="text-center"  width="80px" >Class</th>
                                                <th class="text-center"  width="150px" >Section</th>
                                                <th class="text-center" width="150px">
                                                    <!-- <a href="#" id="showModalCreate" class="create-session btn btn-success btn-md" data-toggle="modal" data-target="#modalCreate" data-backdrop="static" data-keyboard="false">-->
                                                    <a href="#" id="showModalCreate" class="create-class btn btn-success btn-md">
                                                        <i class="fa fa-plus"></i>New Class
                                                    </a>

                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="class-list" name="class-list">
                                            {{csrf_field()}}
                                            <?php
                                $no=1;
                            ?>
                                                @foreach($clas as $key=>$value)
                                                <!---<tr class="class{{$value->id}}">-->
                                                <tr id="class{{$value->id}}">
                                                    <!-- <td>{{$no++}}</td>-->
                                                    <!--<td>{{$value->id}}</td>-->
                                                    <td class="text-center" >{{$value->Classs}}</td>
                                                    <td class="text-center" >{{$value->Section}}</td>
                                                    <td>
                                                        <a href="#" class="show-class btn btn-info btn-sm" data-id="{{$value->id}}" data-class="{{$value->Classs}}" data-section="{{$value->Section}}" value="{{$value->id}}">
                                                            <i class="fa fa-eye"></i>
                                                            View
                                                        </a>
                                                        <a href="#" class="edit-class btn btn-warning btn-sm" data-id="{{$value->id}}" data-class="{{$value->Classs}}" data-section="{{$value->Section}}" value="{{$value->id}}">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <a href="#" class="delete-class btn btn-danger btn-sm" data-id="{{$value->id}}" data-class="{{$value->Classs}}" data-section="{{$value->Section}}" value="{{$value->id}}">
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




        <!--New class Modal -->

        <div class="modal fade" id="modalCreate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">New Class</h4>
                        <p><h3 id="savedMessage" style="text-align:center;color:green;"></h3></p>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="createClassForm">
                            <div class="form-group row add">
                                <label for="section" class="control-label col-sm-2">Section :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select id = "section">
                                        <option value="">==Select a section==</option>
                                        <option value="NUR">Nursery</option>
                                        <option value="PRI">Primary</option>
                                        <option value="JS">Junior Secondary</option>
                                        <option value="SS">Senior Secondary</option>
                                    </select> 
                                    <span class="help-block section-error red"></span>
                                </div>
                            </div>
                            <div class="form-group row add">
                                <label for="class" class="control-label col-sm-2">Class :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="class" name="class" placeholder="Enter Class" required autofocus>
                                    <span class="help-block classs-error red"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveClass">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- New Class Modal End -->





        <!--View Class Modal -->

        <div class="modal fade" id="modalView">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">View Class</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="viewClassForm">
                            

                            <div class="form-group row add">
                                <label for="section" class="control-label col-sm-2">Section :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="sectionview" name="sectionview" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>


                            <div class="form-group row add">
                                <label for="class" class="control-label col-sm-2">Class :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="classview" name="classview" disabled>
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

        <!-- View Class Modal End -->



        <!--Update Class Modal starts -->
        <div class="modal fade" id="modalUpdate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Class</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="updateClassForm">

                            <div class="form-group row add">
                                <label for="section" class="control-label col-sm-2">Section :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select id = "updatesectionSelect">
                                        <option value="">==Select a section==</option>
                                        <option value="NUR">Nursery</option>
                                        <option value="PRI">Primary</option>
                                        <option value="JS">Junior Secondary</option>
                                        <option value="SS">Senior Secondary</option>
                                    </select> 
                                    <span class="help-block section-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="class" class="control-label col-sm-2">Class :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="updateclassText" name="updateclass" required autofocus>
                                    <span class="help-block classs-error red"></span>
                                </div>
                            </div>
                            <input type="hidden" name="clasID" id = "clasID">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateClass">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Update class modal end -->
        
        
        
        
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
       
       //Display the create class modal form
        $('#showModalCreate').click(function () {
            $('#createClassForm').trigger("reset");
            $('.classs-error').html("");
            $('.section-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            $('#modalCreate').modal({ backdrop: 'static', keyboard: false });
        });

          //Save the class
        $('#saveClass').click(function (e) {
            $('.classs-error').html("");
            $('.section-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            var classs = $('#class').val();
            var section = $('#section').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '/class',
                data: { classs: classs, section:section },
                dataType: 'json',
                success: function (data) {
                    var classs = '<tr id="class' + data.id + '"><td class="text-center">' + data.Classs + '</td>';
                    classs +='<td class="text-center">'+ data.Section +'</td>';
                    classs += '<td><a href="#" class="show-class btn btn-info btn-sm" data-id="' + data.id + '" data-class="' + data.Classs + '" data-section="'+data.Section+'"><i class="fa fa-eye"></i>View</a> ';
                    classs += '<a href="#" class="edit-class btn btn-warning btn-sm" data-id="' + data.id + '" data-class="' + data.Classs + '" data-section="'+data.Section+'"><i class="fa fa-edit"></i>Edit</a> ';
                    classs += '<a href="#" class="delete-class btn btn-danger btn-sm" data-id="' + data.id + '" data-class="' + data.Classs + '" data-section="'+data.Section+'"><i class="glyphicon glyphicon-trash"></i>Delete </a></td></tr>'
                    $('#class-list').append(classs);
                    $('#createClassForm').trigger("reset");
                    $('#savedMessage').html("New class saved successfully")
                    
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


        //Deleting a class
        $('body').on('click', '.delete-class', function () {
            $('.class-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            var clasName;
            clasName = $(this).attr("data-class");
            if (confirm("Are you sure you want to delete this class:   " + clasName)) {
                var classid = $(this).attr("data-id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: 'class/' + classid,
                    success: function (data) {
                        $("#class" + classid).remove();
                        $('#updateMessage').html("Class deleted successfully");
                    },
                    error: function (data) {
                       
                    }
                });
            }
            else {
                return false;
            }
        });

         // Display the View class modal form
         $('body').on('click', '.show-class', function () {
            $('#modalView').modal({ backdrop: 'static', keyboard: false });
            $('#classview').val($(this).attr("data-class"));
            $('#sectionview').val($(this).attr("data-section"));
            $('.classs-error').html("");
            $('.section-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
        });

        // Edit/Update Class
        $('body').on('click', '.edit-class', function () {
            $('#modalUpdate').modal({ backdrop: 'static', keyboard: false });
            $('#updateclassText').val($(this).attr("data-class"));
            $('#clasID').val($(this).attr("data-id"));
            $('#updatesectionSelect').val($(this).attr("data-section"));
            $('.classs-error').html("");
            $('.section-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
        });

        //Saving the update to class
        $('#updateClass').click(function (e) {
            $('.class-error').html("");
            $('.section-error').html("");            
            $('#savedMessage').html("");
            $('#updateMessage').html("");
           var classid = $('#clasID').val();
            var classs = $('#updateclassText').val();
            var section= $('#updatesectionSelect').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            $.ajax({
                type: "PUT",
                url: '/class/' + classid,
                data: { classs: classs, section:section },
                dataType: 'json',
                success: function (data) {
                    var classs = '<tr id="class' + data.id + '"><td class="text-center">' + data.Classs + '</td>';
                    classs +='<td class="text-center">'+ data.Section +'</td>';
                    classs += '<td><a href="#" class="show-class btn btn-info btn-sm" data-id="' + data.id + '" data-class="' + data.Classs + '" data-section="' + data.Section + '"><i class="fa fa-eye"></i>View</a> ';
                    classs += '<a href="#" class="edit-class btn btn-warning btn-sm" data-id="' + data.id + '" data-class="' + data.Classs + '" data-section="' + data.Section + '"><i class="fa fa-edit"></i>Edit</a> ';
                    classs += '<a href="#" class="delete-class btn btn-danger btn-sm" data-id="' + data.id + '" data-class="' + data.Classs + '"data-section="' + data.Section + '"><i class="glyphicon glyphicon-trash"></i>Delete </a></td></tr>';
                    $("#class" + classid).replaceWith(classs);
                    $('#updateMessage').html("Class update successfully");
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