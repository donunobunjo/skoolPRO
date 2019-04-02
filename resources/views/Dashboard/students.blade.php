@extends('Dashboard.layouts.app') 
@section('content')

<section class="content-header">
    <h1>
        DASHBOARD
        <small>
            <!--View Students and add new Student-->
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Administrator</a>
        </li>
        <li class="active">Register Students</li>
        
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <!--Students-->
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
                                <h1>Students</h1>
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
                                                <th class="text-center"  width="80px" >Roll Number</th>
                                                <th class="text-center"  width="150px" >Name</th>
                                                <th class="text-center"  width="70px" >Class</th>
                                                <th class="text-center" width="150px">
                                                    <!-- <a href="#" id="showModalCreate" class="create-session btn btn-success btn-md" data-toggle="modal" data-target="#modalCreate" data-backdrop="static" data-keyboard="false">-->
                                                    <a href="#" id="showModalCreate" class="create-student btn btn-success btn-md">
                                                        <i class="fa fa-plus"></i>New Student
                                                    </a>

                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="student-list" name="student-list">
                                            {{csrf_field()}}
                                            <?php
                                $no=1;
                            ?>
                                                @foreach($student as $key=>$value)
                                                <!---<tr class="class{{$value->id}}">-->
                                                <tr id="student{{$value->id}}">
                                                    <!-- <td>{{$no++}}</td>-->
                                                    <!--<td>{{$value->id}}</td>-->
                                                    <td class="text-center" >{{$value->RollNumber}}</td>
                                                    <td class="text-center" >{{$value->FullName}}</td>
                                                    <td class="text-center" >{{$value->Class}}</td>
                                                    <td>
                                                        <a href="#" class="show-student btn btn-info btn-sm" data-id="{{$value->id}}" data-rollNumber="{{$value->RollNumber}}" data-gender="{{$value->Gender}}" data-fullname="{{$value->FullName}}" data-class="{{$value->Class}}" data-state="{{$value->State}}" data-lg="{{$value->Lg}}" data-address="{{$value->Address}}" data-phone="{{$value->Phone}}" value="{{$value->id}}">
                                                            <i class="fa fa-eye"></i>
                                                            View
                                                        </a>
                                                        <a href="#" class="edit-student btn btn-warning btn-sm" data-id="{{$value->id}}" data-rollNumber="{{$value->RollNumber}}" data-gender="{{$value->Gender}}" data-fullname="{{$value->FullName}}" data-class="{{$value->Class}}" data-state="{{$value->State}}" data-lg="{{$value->Lg}}" data-address="{{$value->Address}}" data-phone="{{$value->Phone}}" value="{{$value->id}}">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <a href="#" class="delete-student btn btn-danger btn-sm" data-id="{{$value->id}}" data-rollNumber="{{$value->RollNumber}}" data-gender="{{$value->Gender}}" data-fullname="{{$value->FullName}}" data-class="{{$value->Class}}" data-state="{{$value->State}}" data-lg="{{$value->Lg}}" data-address="{{$value->Address}}" data-phone="{{$value->Phone}}" value="{{$value->id}}">
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




        <!--New Student Modal -->

        <div class="modal fade" id="modalCreate">
        <div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1" 
    role="dialog" aria-hidden="true" data-backdrop="static"> 
    <div class="modal-dialog modal-sm"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h4 class="modal-title"> 
                    <span class="glyphicon glyphicon-time"> 
                    </span>Please Wait 
                 </h4> 
            </div> 
            <div class="modal-body"> 
                <div class="progress"> 
                    <div class="progress-bar progress-bar-info 
                    progress-bar-striped active" 
                    style="width: 100%"> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">New Student</h4>
                        <p><h3 id="savedMessage" style="text-align:center;color:green;"></h3></p>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="createStudentForm">
                            <div class="form-group row add">
                                <label for="rollNumber" class="control-label col-sm-3">Roll Number :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="rollNumber" name="rollNumber" placeholder="Roll Number ..">
                                    <span class="help-block RollNumber-error red"></span>
                                </div>
                            </div>


                            <div class="form-group row add">
                                <label for="names" class="control-label col-sm-3">Name :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="names" name="names" placeholder="Student's name ...">
                                    <span class="help-block FullName-error red"></span>
                                </div>
                            </div>


                            <div class="form-group row add">
                                <label for="gender" class="control-label col-sm-3">Gender :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <select id = "gender" class="form-control">
                                        <option value="">--Select Gender--</option>
                                        <option value="FEMALE">FEMALE</option>
                                        <option value="MALE">MALE</option>
                                    </select> 
                                    <span class="help-block Gender-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="classs" class="control-label col-sm-3">Class :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <select id = "classs" class="form-control">
                                        <option value="">--Select Class--</option>
                                         @foreach($class_list as $class)
                                                <option value="{{ $class->Classs}}">{{ $class->Classs }}</option>
                                         @endforeach
                                    </select> 
                                    <span class="help-block Class-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="state" class="control-label col-sm-3">State :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <select id = "state" class="form-control">
                                        <option value="">--Select State--</option>
                                        @foreach($state_list as $state)
                                                <option value="{{ $state->State}}">{{ $state->State }}</option>
                                         @endforeach
                                    </select> 
                                    <span class="help-block State-error red"></span>
                                </div>
                            </div>


                            <div class="form-group row add">
                                <label for="lg" class="control-label col-sm-3">Lg :
                                    <span class="red" id="req">* <i id="spinForLg"class="fa fa-spinner fa-spin" style="font-size:24px;color:black;visibility:hidden;" ></i> </span>
                                </label>
                                <div class="col-sm-9">
                                    <select id = "lg" class="form-control">
                                        <option value="">--Select LG--</option>
                                        <option value="FEMALE">FEMALE</option>
                                        <option value="MALE">MALE</option>
                                    </select> 
                                    <span class="help-block Lg-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="phone" class="control-label col-sm-3">Parent's Phone Num :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number ...">
                                    <span class="help-block Phone-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="address" class="control-label col-sm-3">Address :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                <textarea rows="2" cols="30" placeholder="Address ...." id = "address">

                                </textarea> 
                                    <span class="help-block Address-error red"></span>
                                </div>
                            </div>

                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveStudent">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- New Student Modal End -->





        <!--View Student Modal -->

        <div class="modal fade" id="modalView">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">View Student</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="viewStudentForm">
                            
                            <div class="form-group row add">
                                <label for="class" class="control-label col-sm-3">Roll Number :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="studentview" name="studentview" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="names" class="control-label col-sm-3">Name :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nameview" name="nameview" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>


                            <div class="form-group row add">
                                <label for="gender" class="control-label col-sm-3">Gender :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="genderview" name="genderview" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            

                            <div class="form-group row add">
                                <label for="classview" class="control-label col-sm-3">Class :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="classview" name="classview" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="stateview" class="control-label col-sm-3">State :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="stateview" name="stateview" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="lgview" class="control-label col-sm-3">Local govt. :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lgview" name="lgview" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="phoneview" class="control-label col-sm-3">Parent Phone #. :
                                    <span id="req"></span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phoneview" name="phoneview" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="address" class="control-label col-sm-3">Address :
                                    <span class="red" id="req"></span>
                                </label>
                                <div class="col-sm-9">
                                <textarea rows="2" cols="30" id = "addressview" disabled>

                                </textarea> 
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

        <!-- View Student Modal End -->



        <!--Update Student Modal starts -->
        <div class="modal fade" id="modalUpdate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Student</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="updateStudentForm">
                            
                            <div class="form-group row add">
                                <label for="rollNumber" class="control-label col-sm-3">Roll Number :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="updaterollNumberText" name="updaterollNumber" disabled>
                                    <span class="help-block RollNumber-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="nameupdate" class="control-label col-sm-3">Name :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nameupdate" name="nameupdate">
                                    <span class="help-block FullName-error red"></span>
                                </div>
                            </div>


                            <div class="form-group row add">
                                <label for="gender" class="control-label col-sm-3">Gender :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <select id = "updategenderSelect" class="form-control">
                                        <option value="">--Edit Gender--</option>
                                        <option value="FEMALE">FEMALE</option>
                                        <option value="MALE">MALE</option>
                                    </select> 
                                    <span class="help-block Gender-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="classupdate" class="control-label col-sm-3">Class :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <select id = "classupdate" class="form-control">
                                        <option value="">--Edit Class--</option>
                                        @foreach($class_list as $class)
                                                <option value="{{ $class->Classs}}">{{ $class->Classs }}</option>
                                         @endforeach
                                    </select> 
                                    <span class="help-block Class-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="stateupdate" class="control-label col-sm-3">State :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <select id = "stateupdate" class="form-control">
                                        <option value="">--Edit State--</option>
                                        @foreach($state_list as $state)
                                        <option value="{{ $state->State}}">{{ $state->State }}</option>
                                         @endforeach
                                    </select> 
                                    <span class="help-block State-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="lgupdate" class="control-label col-sm-3">Local Govt. :
                                    <span class="red" id="req">*<i id="spinForLgUpdate"class="fa fa-spinner fa-spin" style="font-size:24px;color:black;visibility:hidden;" ></i></span>
                                </label>
                                <div class="col-sm-9">
                                    <select id = "lgupdate" class="form-control">
                                        <option value="">--Edit Local Govt.--</option>
                                       
                                    </select> 
                                    <span class="help-block Lg-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="phoneupdate" class="control-label col-sm-3">Parent's Phone # :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phoneupdate" name="phoneupdate">
                                    <span class="help-block Phone-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="addressupdate" class="control-label col-sm-3">Address :
                                    <span class="red" id="req"></span>
                                </label>
                                <div class="col-sm-9">
                                <textarea rows="2" cols="30" id = "addressupdate">

                                </textarea> 
                                    <span class="help-block Address-error red"></span>
                                </div>
                            </div>

                           
                            <input type="hidden" name="studentID" id = "studentID">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateStudent">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Update S modal end -->
        
        
        
        
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
       
       //Display the create student modal form
        $('#showModalCreate').click(function () {
            $('#createStudentForm').trigger("reset");
            $('.RollNumber-error').html("");
            $('.Gender-error').html("");
            $('.FullName-error').html("");
            $('.Class-error').html("");
            $('.State-error').html("");
            $('.Lg-error').html("");
            $('.Address-error').html("");
            $('.Phone-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            $('#modalCreate').modal({ backdrop: 'static', keyboard: false });
        });
          //Save the student
        $('#saveStudent').click(function (e) {
            $('.RollNumber-error').html("");
            $('.Gender-error').html("");
            $('.FullName-error').html("");
            $('.Class-error').html("");
            $('.State-error').html("");
            $('.Lg-error').html("");
            $('.Address-error').html("");
            $('.Phone-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            var RollNumber = $('#rollNumber').val();
            var Gender = $('#gender').val();
            var FullName = $('#names').val();
            var Class = $('#classs').val();
            var State = $('#state').val();
            var Lg = $('#lg').val();
            var Address = $('#address').val();
            var Phone = $('#phone').val();
           // alert(gender);
           // alert(rollNumber);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '/student',
                data: { RollNumber: RollNumber, Gender:Gender, FullName:FullName, Class:Class, State:State, Lg:Lg, Address:Address, Phone:Phone },
                dataType: 'json',
                success: function (data) {
                    var student = '<tr id="student' + data.id + '"><td class="text-center">' + data.RollNumber + '</td>';
                    student +='<td class="text-center">'+data.FullName+'</td>'
                    student +='<td class="text-center">'+ data.Gender +'</td>';
                    student += '<td><a href="#" class="show-student btn btn-info btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '" data-gender="'+data.Gender+'" data-fullname="'+data.FullName+'"data-class="'+data.Class+'" data-state="'+data.State+'" data-lg="'+data.Lg+'" data-address="'+data.Address+'" data-phone="'+data.Phone+'"><i class="fa fa-eye"></i>View</a> ';
                    student += '<a href="#" class="edit-student btn btn-warning btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '" data-gender="'+data.Gender+'" data-fullname="'+data.FullName+'"data-class="'+data.Class+'" data-state="'+data.State+'" data-lg="'+data.Lg+'" data-address="'+data.Address+'" data-phone="'+data.Phone+'"><i class="fa fa-edit"></i>Edit</a> ';
                    student += '<a href="#" class="delete-student btn btn-danger btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '" data-gender="'+data.Gender+'" data-fullname="'+data.FullName+'"data-class="'+data.Class+'" data-state="'+data.State+'" data-lg="'+data.Lg+'" data-address="'+data.Address+'" data-phone="'+data.Phone+'"><i class="glyphicon glyphicon-trash"></i>Delete </a></td></tr>'
                    $('#student-list').append(student);
                    $('#createStudentForm').trigger("reset");
                    $('#savedMessage').html("New Student saved successfully")
                    
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
        //Deleting a student
        $('body').on('click', '.delete-student', function () {
            $('.rollNumber-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
            var rollNumber;
            rollNumber = $(this).attr("data-rollNumber");
            if (confirm("Are you sure you want to delete this student:   " + rollNumber)) {
                var studentid = $(this).attr("data-id");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: 'student/' + studentid,
                    success: function (data) {
                        $("#student" + studentid).remove();
                        $('#updateMessage').html("Student deleted successfully");
                    },
                    error: function (data) {
                       
                    }
                });
            }
            else {
                return false;
            }
        });
         // Display the View student modal form
         $('body').on('click', '.show-student', function () {
            $('#modalView').modal({ backdrop: 'static', keyboard: false });
            $('#studentview').val($(this).attr("data-rollNumber"));
            $('#genderview').val($(this).attr("data-gender"));
            $('#nameview').val($(this).attr("data-fullname"));
            $('#classview').val($(this).attr("data-class"));
            $('#stateview').val($(this).attr("data-state"));
            $('#lgview').val($(this).attr("data-lg"));
            $('#phoneview').val($(this).attr("data-phone"));
            $('#addressview').val($(this).attr("data-address"));
            $('.rollNumber-error').html("");
            $('.gender-error').html("");
            $('#savedMessage').html("");
            $('#updateMessage').html("");
        });
        // Edit/Update Student
        $('body').on('click', '.edit-student', function () {
           // alert($(this).attr("data-state"));
           // alert($(this).attr("data-lg"));
            $('#modalUpdate').modal({ backdrop: 'static', keyboard: false });
            $('#updaterollNumberText').val($(this).attr("data-rollNumber"));
            $('#studentID').val($(this).attr("data-id"));
            $('#updategenderSelect').val($(this).attr("data-gender"));
            $('#nameupdate').val($(this).attr("data-fullname"));
            $('#classupdate').val($(this).attr("data-class"));
            $('#stateupdate').val($(this).attr("data-state"));
           // alert($('#stateupdate').val());
            $('#lgupdate').val($(this).attr("data-lg"));
            $('#phoneupdate').val($(this).attr("data-phone"));
            $('#addressupdate').val($(this).attr("data-address"));
            $('.RollNumber-error').html("");
            $('.Gender-error').html("");
            $('.FullName-error').html("");
            $('.Class-error').html("");
            $('.State-error').html("");
            $('.Lg-error').html("");
            $('.Address-error').html("");
            $('.Phone-error').html("");
        });
        //Saving the update to student
        $('#updateStudent').click(function (e) {
            $('.Gender-error').html("");
            $('.FullName-error').html("");
            $('.Class-error').html("");
            $('.State-error').html("");
            $('.Lg-error').html("");
            $('.Address-error').html("");
            $('.Phone-error').html("");          
            $('#savedMessage').html("");
            $('#updateMessage').html("");
           var studentid = $('#studentID').val();
            var RollNumber = $('#updaterollNumberText').val();
            var Gender= $('#updategenderSelect').val();
            var FullName= $('#nameupdate').val();
            var Class= $('#classupdate').val();
            var State= $('#stateupdate').val();
            var Lg= $('#lgupdate').val();
            var Phone= $('#phoneupdate').val();
            var Address= $('#addressupdate').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            $.ajax({
                type: "PUT",
                url: '/student/' + studentid,
                data: { RollNumber: RollNumber, Gender:Gender, FullName:FullName, Class:Class, State:State, Lg:Lg, Phone:Phone, Address:Address },
                dataType: 'json',
                success: function (data) {
                    alert("Success");
                    /*var student = '<tr id="student' + data.id + '"><td class="text-center">' + data.RollNumber + '</td>';
                    student +='<td class="text-center">'+ data.Gender +'</td>';
                    student += '<td><a href="#" class="show-student btn btn-info btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '" data-gender="' + data.Gender + '"><i class="fa fa-eye"></i>View</a> ';
                    student += '<a href="#" class="edit-student btn btn-warning btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '" data-gender="' + data.Gender + '"><i class="fa fa-edit"></i>Edit</a> ';
                    student += '<a href="#" class="delete-student btn btn-danger btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '"data-gender="' + data.Gender + '"><i class="glyphicon glyphicon-trash"></i>Delete </a></td></tr>';*/
                    var student = '<tr id="student' + data.id + '"><td class="text-center">' + data.RollNumber + '</td>';
                    student +='<td class="text-center">'+data.FullName+'</td>'
                    student +='<td class="text-center">'+ data.Gender +'</td>';
                    student += '<td><a href="#" class="show-student btn btn-info btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '" data-gender="'+data.Gender+'" data-fullname="'+data.FullName+'"data-class="'+data.Class+'" data-state="'+data.State+'" data-lg="'+data.Lg+'" data-address="'+data.Address+'" data-phone="'+data.Phone+'"><i class="fa fa-eye"></i>View</a> ';
                    student += '<a href="#" class="edit-student btn btn-warning btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '" data-gender="'+data.Gender+'" data-fullname="'+data.FullName+'"data-class="'+data.Class+'" data-state="'+data.State+'" data-lg="'+data.Lg+'" data-address="'+data.Address+'" data-phone="'+data.Phone+'"><i class="fa fa-edit"></i>Edit</a> ';
                    student += '<a href="#" class="delete-student btn btn-danger btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '" data-gender="'+data.Gender+'" data-fullname="'+data.FullName+'"data-class="'+data.Class+'" data-state="'+data.State+'" data-lg="'+data.Lg+'" data-address="'+data.Address+'" data-phone="'+data.Phone+'"><i class="glyphicon glyphicon-trash"></i>Delete </a></td></tr>';
                    $("#student" + studentid).replaceWith(student);
                    $('#updateMessage').html("Student update successfully");
                    $("#modalUpdate").modal("hide");
                },
                error: function (data) {
                    if (data.status === 422) {
                        $.each(data.responseJSON.errors, function (key, value) {
                            $('.' + key + '-error').html(value);
                        });
                    } else {
                        
                    }
                    alert(JSON.stringify(data));
                }
            });
            
        });
        //Sending the state and getting the lgs to load the lg select for create
        $("#state").change(function(){
            var State = $(this).val();
            //alert(State);
            if(State != ''){
                //$('#myPleaseWait').modal('show');
                $('#spinForLg').css('visibility','visible');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
               
                //alert(State);
                $.ajax({
                    type: "post",
                    url: 'student/fetch',
                    data: {
                         State: State                     
                    },
                    success: function (data) {
                       // $('#myPleaseWait').modal('hide');
                       $('#spinForLg').css('visibility','hidden')
                        if(data){
                          var mylgs = data;
                          //console.log(mylgs);
                          $('#lg').empty();
                          $('#lg').append('<option value = "">----Select Local Govt.----</option>');
                          $.each(mylgs,function(key,value){
                                $('#lg').append('<option value="'+value.Lg+'">'+value.Lg+'</option>');
                               
                                
                          }
                         //$('#myPleaseWait').modal('hide');
                          );
                        }
                        //alert('success');
                        //alert(JSON.stringify(data));
                    },
                    error: function (data) {
                        //alert('failure');
                       
                    }
                });
            }
        });
        //Sending the state and getting the lgs to load the lg select for update
        $("#stateupdate").change(function(){
            var State = $(this).val();
            //alert(State);
            if(State != ''){
                //$('#myPleaseWait').modal('show');
                $('#spinForLgUpdate').css('visibility','visible');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
               
                //alert(State);
                $.ajax({
                    type: "post",
                    url: 'student/fetch',
                    data: {
                         State: State                     
                    },
                    success: function (data) {
                       // $('#myPleaseWait').modal('hide');
                       $('#spinForLgUpdate').css('visibility','hidden')
                        if(data){
                          var mylgs = data;
                          //console.log(mylgs);
                          $('#lgupdate').empty();
                          $('#lgupdate').append('<option value = "">----Select Local Govt.----</option>');
                          $.each(mylgs,function(key,value){
                                $('#lgupdate').append('<option value="'+value.Lg+'">'+value.Lg+'</option>');
                               
                                
                          }
                         //$('#myPleaseWait').modal('hide');
                          );
                        }
                        //alert('success');
                        //alert(JSON.stringify(data));
                    },
                    error: function (data) {
                        //alert('failure');
                       
                    }
                });
            }
        });

        $("#modalUpdate").on('show.bs.modal', function(){
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            alert('The modal is about to be shown.');
            alert($('#stateupdate').val());
        });

    });
</script> 
@endsection