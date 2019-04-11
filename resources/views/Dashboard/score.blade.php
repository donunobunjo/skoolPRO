@extends('Dashboard.layouts.app') 
@section('content')
<section class="content-header">
    <h1>
       <!-- DASHBOARD-->
        <small>
            <!--View Students and add new Student-->
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard"></i> Teacher</a>
        </li>
        <li class="active">Enter Scores</li>

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
           <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="margin-bottom:25px;">
                                <h1>Enter Student's Score</h1>
                                <h3 id="updateMessage" style="color:green;text-align:center;"></h3>
                            </div>
                            <div style="text-align:center;">
                                   <!-- <label>Class</label>
                                    <select class="select2" style="width: 30%;margin-top:20px" id=classList>
                                        <option value="">--Select Current Class--</option>
                                       
                                    </select>-->
                                    <form class="form-inline" id="parameterForm">
                                    <fieldset>
                                    <legend>Choose parameters</legend>
                                            <label for="session">Session:</label>
                                            <select id = "session" class="form-control">
                                                <option value="">--Select Session--</option>
                                                @foreach($session_list as $session)
                                                    <option value="{{ $session->Session}}">{{ $session->Session }}</option>
                                                @endforeach
                                            </select> 
                                            <label for="term">Term:</label>
                                            <select id = "term" class="form-control">
                                                <option value="">--Select Term--</option>
                                                <option value="1st">First</option>
                                                <option value="2nd">Second</option>
                                                <option value="3rd">Third</option>
                                            </select> 
                                            <label for="class">Class:</label>
                                            <select id = "class" class="form-control">
                                                <option value="">--Select Class--</option>
                                                    @foreach($class_list as $class)
                                                        <option value="{{ $class->Classs}}">{{ $class->Classs }}</option>
                                                     @endforeach
                                            </select> 
                                            <label for="subject">Subject:</label>
                                            <select id = "subject" class="form-control">
                                                <option value="">--Select Subject--</option>
                                                @foreach($subject_list as $subject)
                                                        <option value="{{ $subject->Subject}}">{{ $subject->Subject }}</option>
                                                @endforeach
                                            </select> 
                                           <button type="button" class="btn btn-primary" id="btnparameters" style="	visibility: hidden;">Reset</button>
                                    </fieldset>
                                    </form> 
                                    <form class="form-inline">
                                    <fieldset>
                                    <legend>Enter details</legend>
                                            <i id="spinForStudentName"class="fa fa-spinner fa-spin" style="font-size:24px;color:black;visibility:hidden;" ></i>
                                            <label for="fullname">Name:</label>
                                            <select id = "fullname" class="form-control">
                                                <option value="">--Select Student Name--</option>
                                                <option value="FEMALE">FEMALE</option>
                                                <option value="MALE">MALE</option>
                                            </select> 
                                            <label for="firstca">First CA:</label>
                                            <input type="number" id= "firstca">
                                            <label for="secondca">Second CA:</label>
                                            <input type="number" id= "secondca">
                                            <label for="exam">Exam:</label>
                                            <input type="number" id = "exam">
                                            <button type="button" class="btn btn-primary" id="btnsubmit">Submit</button>
                                    </fieldset>
                                    </form>
                            </div>
                            <div class="panel-body">

                                <div class="table table-responsive">
                                    <table class="table table-bordered table-striped" id="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="80px">Roll Number</th>
                                                <th class="text-center" width="150px">Name</th>
                                                <th class="text-center" width="70px">First CA</th>
                                                <th class="text-center" width="70px">Second CA</th>
                                                <th class="text-center" width="70px">Exam</th>
                                                <th class="text-center" width="150px">
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="student-list" name="student-list">
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





@endsection 
@section('scripts')
<script type="text/javascript">

    $(document).ready(function () {
       $("#subject").change(function(){
           
           if ($(this).find('option:selected').val()==""||$('#session option:selected').val()==""||$('#term option:selected').val()==""||$('#class option:selected').val()==""){
                 alert("You need to select an option for all the parameters");
            }
            else{
                $("#session").attr("disabled", true);
                $("#subject").attr("disabled", true);
                $("#term").attr("disabled", true);
                $("#class").attr("disabled", true);
                $("#btnparameters").css("visibility","visible");
            }
           
        });

        $('#btnsubmit').click(function(){
           // alert("yipeeee");
            
        });

        $('#btnparameters').click(function(){
                $("#session").attr("disabled", false);
                $("#subject").attr("disabled", false);
                $("#term").attr("disabled", false);
                $("#class").attr("disabled", false);
                $("#parameterForm").trigger("reset");
                $(this).css("visibility","hidden");
        });

        $('#class').change(function(){
            var Classs = $(this).val();
            if (Classs !=""){
                $('#spinForStudentName').css('visibility','visible');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "get",
                    url: '/student/class',
                    data: {
                         Classs: Classs                    
                    },
                    success: function (data) {
                       // $('#myPleaseWait').modal('hide');
                       $('#spinForStudentName').css('visibility','hidden')
                        if(data){
                          var students_list = data;
                          //console.log(mylgs);
                          $('#fullname').empty();
                          $('#fullname').append('<option value = "">----Select Student----</option>');
                          $.each(students_list,function(key,value){
                                $('#fullname').append('<option value="'+value.RollNumber+'">'+value.FullName+'</option>');
                               
                                
                          }
                         //$('#myPleaseWait').modal('hide');
                          );
                        }
                        //alert('success');
                        alert(JSON.stringify(data));
                    },
                    error: function (data) {
                        //alert('failure');
                       
                    }
                });
                alert("heloooooo")
            }
            
        });
    });
</script> 
@endsection
