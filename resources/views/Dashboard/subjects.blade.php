@extends('Dashboard.layouts.app') 
@section('content')

<section class="content-header">
    <h1>
        DASHBOARD
        <small>
            <!--View Subjects and add new Subject-->
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Administrator</a>
        </li>
        <li class="active">Setup</li>
        <li class="active">Subjects</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <!--Subjects-->
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
                                <h1>Subjects</h1>
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
                                                <th class="text-center"  width="80px" >Subject</th>
                                                <th class="text-center"  width="150px" >Category</th>
                                                <th class="text-center" width="150px">
                                                    <!-- <a href="#" id="showModalCreate" class="create-session btn btn-success btn-md" data-toggle="modal" data-target="#modalCreate" data-backdrop="static" data-keyboard="false">-->
                                                    <a href="#" id="showModalCreate" class="create-subject btn btn-success btn-md">
                                                        <i class="fa fa-plus"></i>New Subject
                                                    </a>

                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="subject-list" name="subject-list">
                                            {{csrf_field()}}
                                            <?php
                                $no=1;
                            ?>
                                                @foreach($subject as $key=>$value)
                                                <!---<tr class="class{{$value->id}}">-->
                                                <tr id="subject{{$value->id}}">
                                                    <!-- <td>{{$no++}}</td>-->
                                                    <!--<td>{{$value->id}}</td>-->
                                                    <td class="text-center" >{{$value->Subject}}</td>
                                                    <td class="text-center" >{{$value->Category}}</td>
                                                    <td>
                                                        <a href="#" class="show-subject btn btn-info btn-sm" data-id="{{$value->id}}" data-subject="{{$value->Subject}}" data-category="{{$value->Category}}" value="{{$value->id}}">
                                                            <i class="fa fa-eye"></i>
                                                            View
                                                        </a>
                                                        <a href="#" class="edit-subject btn btn-warning btn-sm" data-id="{{$value->id}}" data-subject="{{$value->Subject}}" data-category="{{$value->Category}}" value="{{$value->id}}">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <a href="#" class="delete-subject btn btn-danger btn-sm" data-id="{{$value->id}}" data-subject="{{$value->Subject}}" data-category="{{$value->Category}}" value="{{$value->id}}">
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




        <!--New Subject Modal -->

        <div class="modal fade" id="modalCreate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">New Subject</h4>
                        <p><h3 id="savedMessage" style="text-align:center;color:green;"></h3></p>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="createSubjectForm">
                            <div class="form-group row add">
                                <label for="category" class="control-label col-sm-2">Category :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select id = "category" class="form-control">
                                        <option value="">--Select Category--</option>
                                        <option value="ALL">All</option>
                                        <option value="NUR">Nursery</option>
                                        <option value="PRI">Primary</option>
                                        <option value="JS">Junior Secondary</option>
                                        <option value="SS">Senior Secondary</option>
                                    </select> 
                                    <span class="help-block category-error red"></span>
                                </div>
                            </div>
                            <div class="form-group row add">
                                <label for="subject" class="control-label col-sm-2">Subject :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required autofocus>
                                    <span class="help-block subject-error red"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveSubject">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- New Subject Modal End -->





        <!--View Subject Modal -->

        <div class="modal fade" id="modalView">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">View Subject</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="viewSubjectForm">
                            

                            <div class="form-group row add">
                                <label for="category" class="control-label col-sm-2">Category :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="categoryview" name="categoryview" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>


                            <div class="form-group row add">
                                <label for="class" class="control-label col-sm-2">Subject :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subjectview" name="subjectview" disabled>
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

        <!-- View Subject Modal End -->



        <!--Update Subject Modal starts -->
        <div class="modal fade" id="modalUpdate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Subject</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="updateSubjectForm">

                            <div class="form-group row add">
                                <label for="category" class="control-label col-sm-2">Category :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select id = "updatecategorySelect" class="form-control">
                                        <option value="">--Select Category--</option>
                                        <option value="ALL">All</option>
                                        <option value="NUR">Nursery</option>
                                        <option value="PRI">Primary</option>
                                        <option value="JS">Junior Secondary</option>
                                        <option value="SS">Senior Secondary</option>
                                    </select> 
                                    <span class="help-block category-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="subject" class="control-label col-sm-2">Subject :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="updatesubjectText" name="updatesubject" required autofocus>
                                    <span class="help-block subject-error red"></span>
                                </div>
                            </div>
                            <input type="hidden" name="subjectID" id = "subjectID">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateSubject">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Update Subject modal end -->
        
        
        
        
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
       
       //Display the create subject modal form
        $('#showModalCreate').click(function () {
            $('#createSubjectForm').trigger("reset");
            $('.subject-error').html("");
            $('.category-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            $('#modalCreate').modal({ backdrop: 'static', keyboard: false });
        });

          //Save the subject
        $('#saveSubject').click(function (e) {
            $('.subject-error').html("");
            $('.category-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            var subject = $('#subject').val();
            var category = $('#category').val();
            alert(category);
            alert(subject);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();

            $.ajax({
                type: 'post',
                url: '/subject',
                data: { subject: subject, category:category },
                dataType: 'json',
                success: function (data) {
                    var subject = '<tr id="subject' + data.id + '"><td class="text-center">' + data.Subject + '</td>';
                    subject +='<td class="text-center">'+ data.Category +'</td>';
                    subject += '<td><a href="#" class="show-subject btn btn-info btn-sm" data-id="' + data.id + '" data-subject="' + data.Subject + '" data-category="'+data.Category+'"><i class="fa fa-eye"></i>View</a> ';
                    subject += '<a href="#" class="edit-subject btn btn-warning btn-sm" data-id="' + data.id + '" data-subject="' + data.Subject + '" data-category="'+data.Category+'"><i class="fa fa-edit"></i>Edit</a> ';
                    subject += '<a href="#" class="delete-subject btn btn-danger btn-sm" data-id="' + data.id + '" data-subject="' + data.Subject + '" data-category="'+data.Category+'"><i class="glyphicon glyphicon-trash"></i>Delete </a></td></tr>'
                    $('#subject-list').append(subject);
                    $('#createSubjectForm').trigger("reset");
                    $('#savedMessage').html("New Subject saved successfully")
                    
                },
                error: function (data) {
                   // alert(JSON.stringify(data));
                   if (data.status === 422) {
                        $.each(data.responseJSON.errors, function (key, value) {
                            $('.' + key + '-error').html(value);
                        });
                    } else {
                        
                    }
                }
            });
        });


        //Deleting a subject
        $('body').on('click', '.delete-subject', function () {
            $('.subject-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            var subjectName;
            subjectName = $(this).attr("data-subject");
            if (confirm("Are you sure you want to delete this subject:   " + subjectName)) {
                var subjectid = $(this).attr("data-id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: 'subject/' + subjectid,
                    success: function (data) {
                        $("#subject" + subjectid).remove();
                        $('#updateMessage').html("Subject deleted successfully");
                    },
                    error: function (data) {
                       
                    }
                });
            }
            else {
                return false;
            }
        });

         // Display the View subject modal form
         $('body').on('click', '.show-subject', function () {
            $('#modalView').modal({ backdrop: 'static', keyboard: false });
            $('#subjectview').val($(this).attr("data-subject"));
            $('#categoryview').val($(this).attr("data-category"));
            $('.subject-error').html("");
            $('.category-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
        });

        // Edit/Update Subject
        $('body').on('click', '.edit-subject', function () {
            $('#modalUpdate').modal({ backdrop: 'static', keyboard: false });
            $('#updatesubjectText').val($(this).attr("data-subject"));
            $('#subjectID').val($(this).attr("data-id"));
            $('#updatecategorySelect').val($(this).attr("data-category"));
            $('.subject-error').html("");
            $('.category-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
        });

        //Saving the update to subject
        $('#updateSubject').click(function (e) {
            $('.subject-error').html("");
            $('.category-error').html("");            
            $('#savedMessage').html("");
            $('#updateMessage').html("");
           var subjectid = $('#subjectID').val();
            var subject = $('#updatesubjectText').val();
            var category= $('#updatecategorySelect').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            $.ajax({
                type: "PUT",
                url: '/subject/' + subjectid,
                data: { subject: subject, category:category },
                dataType: 'json',
                success: function (data) {
                    var subject = '<tr id="subject' + data.id + '"><td class="text-center">' + data.Subject + '</td>';
                    subject +='<td class="text-center">'+ data.Category +'</td>';
                    subject += '<td><a href="#" class="show-subject btn btn-info btn-sm" data-id="' + data.id + '" data-subject="' + data.Subject + '" data-category="' + data.Category + '"><i class="fa fa-eye"></i>View</a> ';
                    subject += '<a href="#" class="edit-subject btn btn-warning btn-sm" data-id="' + data.id + '" data-subject="' + data.Subject + '" data-category="' + data.Category + '"><i class="fa fa-edit"></i>Edit</a> ';
                    subject += '<a href="#" class="delete-subject btn btn-danger btn-sm" data-id="' + data.id + '" data-subject="' + data.Subject + '"data-category="' + data.Category + '"><i class="glyphicon glyphicon-trash"></i>Delete </a></td></tr>';
                    $("#subject" + subjectid).replaceWith(subject);
                    $('#updateMessage').html("Subject update successfully");
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