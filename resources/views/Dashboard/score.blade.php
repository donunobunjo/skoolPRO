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
                                    <form class="form-inline">
                                    <fieldset>
                                    <legend>Choose parameters</legend>
                                            <label for="session">Session:</label>
                                            <select id = "session" class="form-control">
                                                <option value="">--Select Session--</option>
                                                <option value="FEMALE">FEMALE</option>
                                                <option value="MALE">MALE</option>
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
                                                <option value="1st">First</option>
                                                <option value="2nd">Second</option>
                                                <option value="3rd">Third</option>
                                            </select> 
                                            <label for="subject">Subject:</label>
                                            <select id = "subject" class="form-control">
                                                <option value="">--Select Subject--</option>
                                                <option value="1st">First</option>
                                                <option value="2nd">Second</option>
                                                <option value="3rd">Third</option>
                                            </select> 
                                           <!-- <button type="button" class="btn btn-primary" id="btnparameters">Ok</button>-->
                                    </fieldset>
                                    </form> 
                                    <form class="form-inline">
                                    <fieldset>
                                    <legend>Enter details</legend>
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
      // alert("yipeeeeeeeee");


      $("#subject").change(function(){
           /* var Classs = $(this).find('option:selected').val();
            if (Classs==""){
                alert('You need to select a class');
                return false;
            }*/
            var subject = $(this).find('option:selected').val();
            var session= $('#session').val();
            //var class= $('#class').val();            
           // var term= $('#term').val();
           alert(session);
           
        });
    });
</script> 
@endsection
