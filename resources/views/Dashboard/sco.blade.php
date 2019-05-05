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
                        <h4 class="modal-title">Score</h4>
                        <p><h3 id="savedMessage" style="text-align:center;color:green;"></h3></p>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="createScoreForm">

                        <div class="form-group row add">
                                <label for="fullname" class="control-label col-sm-3">name :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <select id = "fullname" class="form-control">
                                        <option value="">--Select Student Name--</option>
                                        
                                    </select> 
                                    <span class="help-block State-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="firstca" class="control-label col-sm-3">First C.A. :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="firstca" name="firstca" placeholder="First C.A. ..">
                                    <span class="help-block RollNumber-error red"></span>
                                </div>
                            </div>


                            <div class="form-group row add">
                                <label for="secondca" class="control-label col-sm-3">Second C.A. :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="secondca" name="secondca" placeholder="Second C. A. ...">
                                    <span class="help-block FullName-error red"></span>
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="exam" class="control-label col-sm-3">Exam :
                                    <span class="red" id="req">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="exam" name="exam" placeholder="Exam ...">
                                    <span class="help-block FullName-error red"></span>
                                </div>
                            </div>


                            

                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveScore">Save</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- New Student Modal End -->






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
                                <h1>Student's Score</h1>
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
                                            <select id = "classs" class="form-control">
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
                                                    <a href="#" id="showModalCreate" class="create-score btn btn-success btn-md" style="	visibility: hidden;">
                                                        <i class="fa fa-plus"></i>Score
                                                    </a>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="score-list" name="score-list">
                                                        
                                           
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

        $('#showModalCreate').click(function () {
            //alert("gagagagagag");
            //$("#createScoreForm").trigger("reset");
            $('#modalCreate').modal({ backdrop: 'static', keyboard: false });
        });


        // Handle the change event for the subject select
       $("#subject").change(function(){
           var Session;
           var Term;
           var Classs;
           var Subject;
           Session=$("#session").val();
           //alert(Session);
            //Check if all the parameters are selected  disables them
           if ($(this).find('option:selected').val()==""||$('#session option:selected').val()==""||$('#term option:selected').val()==""||$('#class option:selected').val()==""){
                 alert("You need to select an option for all the parameters");
            }
            else{
                $("#session").attr("disabled", true);
                $("#subject").attr("disabled", true);
                $("#term").attr("disabled", true);
                $("#classs").attr("disabled", true);
                $("#btnparameters").css("visibility","visible");
                $("#showModalCreate").css("visibility","visible");
                // populates the table for the scores that are already captured for that class
                Session=$("#session").val();
                Term=$("#term").val();
                Classs=$("#classs").val();
                Subject=$('#subject').val();
                alert(Session+Term+Classs+Subject);
                $('#score-list').empty();
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                $.ajax({
                    type: "get",
                    url: '/score/populate',
                    data:{
                        Session:Session, Term:Term, Classs:Classs, Subject:Subject
                    },
                    success:function(data){
                        //alert(JSON.stringify(data));
                        $.each(data, function(k) {
                        var id = data[k].id;
                        var RollNumber = data[k].RollNumber;
                        var FullName = data[k].FullName;
                        var FirstCA = data[k].FirstCA;
                        var SecondCA = data[k].SecondCA;
                        var Exam = data[k].Exam;
                        var score = '<tr id="score' + id + '"><td class="text-center">' + RollNumber + '</td>';
                        score +='<td class="text-center">'+FullName+'</td>';
                        score +='<td class="text-center">'+FirstCA+'</td>';
                        score +='<td class="text-center">'+SecondCA+'</td>';
                        score +='<td class="text-center">'+Exam+'</td>';
                        score += '<td><a href="#" class="show-class btn btn-info btn-sm" data-id="' + id + '" data-rollNumber="' + RollNumber +'" data-fullname="'+FullName+'"data-firstca="'+FirstCA+'"data-secondca="'+SecondCA+'"data-exam="'+Exam+'"><i class="fa fa-eye"></i>Change Class</a></tr> ';
                        $('#score-list').append(score);
                    });
                    },
                    error:function(data){
                        alert(JSON.stringify(data));
                    }

                });

                alert("hiiiii");
            }
           
        });


                  //Handle the change event for the term select
        $("#session").change(function(){
           // alert("session change");
           
        });


          //Handle the change event for the term select
        $("#term").change(function(){
           // alert("term change");
        });

            //Handle the change event for the class select
        $("#classs").change(function(){
            /// check the duplicate event ooooooooooalert("class change");
        });

        //Save student's score
        $('#saveScore').click(function(){
          // alert("yipeeee");
           var Session = $('#session').val();
           var Term = $('#term').val();
           var Class = $('#classs').val();
           var Subject = $('#subject').val();
           var RollNumber =$('#fullname').val();
           var FullName =$('#fullname').find('option:selected').text();
           var FirstCA =$('#firstca').val();
           var SecondCA =$('#secondca').val();
           var Exam =$('#exam').val();
           
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //e.preventDefault();
           //alert(Session+Term+Class+Subject+RollNumber+FullName+FirstCA+SecondCA+Exam);
           $.ajax({
                type: 'post',
                url: '/score',
                data: { RollNumber: RollNumber, FullName:FullName, Class:Class, Session:Session, Term:Term, Subject:Subject, FirstCA:FirstCA, SecondCA:SecondCA, Exam:Exam },
                dataType: 'json',
                success:function(data){
                    //alert('success');
                    alert(JSON.stringify(data));
                    //$("#createScoreForm").trigger("reset");
                    var score = '<tr id="score' + data.id + '"><td class="text-center">' + data.RollNumber + '</td>';
                    score +='<td class="text-center">'+data.FullName+'</td>';
                    score +='<td class="text-center">'+ data.FirstCA+'</td>';
                    score +='<td class="text-center">'+ data.SecondCA+'</td>';
                    score +='<td class="text-center">'+ data.Exam+'</td>';
                    score += '<td><a href="#" class="show-score btn btn-info btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '" data-fullname="'+data.FullName+'"data-class="'+data.Class+'" data-session="'+data.Session+'" data-term="'+data.Term+'" data-subject="'+data.Subject+'" data-firstca="'+data.FirstCA+'"data-secondca="'+data.SecondCA+'"data-exam="'+data.Exam+'"><i class="fa fa-eye"></i>View</a> ';
                    score += '<a href="#" class="edit-score btn btn-warning btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '" data-fullname="'+data.FullName+'"data-class="'+data.Class+'" data-session="'+data.Session+'" data-term="'+data.Term+'" data-subject="'+data.Subject+'" data-firstca="'+data.FirstCA+'"data-secondca="'+data.SecondCA+'"data-exam="'+data.Exam+'"><i class="fa fa-edit"></i>Edit</a> ';
                    score += '<a href="#" class="delete-score btn btn-danger btn-sm" data-id="' + data.id + '" data-rollNumber="' + data.RollNumber + '" data-fullname="'+data.FullName+'"data-class="'+data.Class+'" data-session="'+data.Session+'" data-term="'+data.Term+'" data-subject="'+data.Subject+'" data-firstca="'+data.FirstCA+'"data-secondca="'+data.SecondCA+'"data-exam="'+data.Exam+'"><i class="glyphicon glyphicon-trash"></i>Delete</a></td></tr> ';
                    $('#score-list').append(score);
                    $('#savedMessage').html("Score has been recorded");
                    $("#createScoreForm").trigger("reset");
                },
                error:function(data){
                   // alert('error');
                    alert(JSON.stringify(data));
                }
            });
           alert("Las Las");
           
        });

        $('#btnparameters').click(function(){
                $("#session").attr("disabled", false);
                $("#subject").attr("disabled", false);
                $("#term").attr("disabled", false);
                $("#classs").attr("disabled", false);
               // $("#create-student").css("visibility","hidden")
                $("#parameterForm").trigger("reset");
                $(this).css("visibility","hidden");
                
        });

        $('#classs').change(function(){
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
                       // alert(JSON.stringify(data));
                    },
                    error: function (data) {
                        //alert('failure');
                       
                    }
                });
               // alert("heloooooo")
            }
            
        });


        $('#savedMessage').change(function(){
            alert("heloolooolooooo");
        });
        
       
    });
</script> 
@endsection
