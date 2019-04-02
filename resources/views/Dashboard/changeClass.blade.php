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
        <li class="active">Change Student Class</li>

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
                                <h1>Change Student's Class</h1>
                                <h3 id="updateMessage" style="color:green;text-align:center;"></h3>
                            </div>
                            <div style="text-align:center;">
                                    <label>Class</label>
                                    <select class="select2" style="width: 30%;margin-top:20px" id=classList>
                                        <option value="">--Select Current Class--</option>
                                        @foreach($class_list as $class)
                                                <option value="{{ $class->Classs}}">{{ $class->Classs }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="panel-body">

                                <div class="table table-responsive">
                                    <table class="table table-bordered table-striped" id="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="80px">Roll Number</th>
                                                <th class="text-center" width="150px">Name</th>
                                                <th class="text-center" width="70px">Class</th>
                                                <th class="text-center" width="150px">
                                                    
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
                                                    <td class="text-center">{{$value->RollNumber}}</td>
                                                    <td class="text-center">{{$value->FullName}}</td>
                                                    <td class="text-center">{{$value->Class}}</td>
                                                    <td>
                                                        <a href="#" class="show-class btn btn-info btn-sm" data-id="{{$value->id}}" data-rollNumber="{{$value->RollNumber}}" data-gender="{{$value->Gender}}"
                                                            data-fullname="{{$value->FullName}}" data-class="{{$value->Class}}"
                                                            data-state="{{$value->State}}" data-lg="{{$value->Lg}}" data-address="{{$value->Address}}"
                                                            data-phone="{{$value->Phone}}" value="{{$value->id}}">
                                                            <i class="fa fa-eye"></i>
                                                            Change
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




        <!--Change student class Modal -->

        <div class="modal fade" id="modalChangeClass">
           <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Change Student Class</h4>
                        <p>
                            <h3 id="savedMessage" style="text-align:center;color:green;"></h3>
                        </p>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" id="changeClass">
                            
                            <div class="form-group row add">
                                <label for="rollNumber" class="control-label col-sm-3">Roll Number :
                                    
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="rollNumber" name="rollNumber"disabled>
                                    
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="names" class="control-label col-sm-3">Name :
                                    
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="names" name="names"disabled>
                                    
                                </div>
                            </div>


                            <div class="form-group row add">
                                <label for="class" class="control-label col-sm-3">Class :
                                    
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="class" name="class"disabled>
                                    
                                </div>
                            </div>

                            <div class="form-group row add">
                                <label for="classs" class="control-label col-sm-3">New Class :
                                    
                                </label>
                                <div class="col-sm-9">
                                    <select id="classs" class="form-control">
                                        <option value="">--Select New Class--</option>
                                        @foreach($class_list as $class)
                                        <option value="{{ $class->Classs}}">{{ $class->Classs }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block Class-error red"></span>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="changeclass">Change Class</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Change student class Modal End -->

@endsection 
@section('scripts')
<script type="text/javascript">

    $(document).ready(function () {
       //alert("helloooooooooo");
        $('body').on('click', '.show-class', function () {
           //alert($(this).attr("data-rollNumber"));
           $('#rollNumber').val($(this).attr("data-rollNumber"));
           $('#names').val($(this).attr("data-fullName"));
           $('#class').val($(this).attr("data-class"));
           $('#modalChangeClass').modal({ backdrop: 'static', keyboard: false });
        });


        // the select element that displays the students in a class for change
        $("#classList").change(function(){
            var value = $(this).find('option:selected').val();
            if (value==""){
                alert('You need to select a class');
                return false;
            }
            $('#student-list').empty();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            alert(value);
            $.ajax({

            });
            alert('after ajax');
           


        });

       
        
    });
</script> 
@endsection