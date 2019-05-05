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
                <i class="fa fa-dashboard"></i> Search</a>
        </li>

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
                                <h1>Seach</h1>
                                <h3 id="updateMessage" style="color:green;text-align:center;"></h3>
                            </div>

                            <div class="panel-body">

                                <div class="table table-responsive">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Roll Number</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <!--<th>Email</th>-->
                                                <th>Phone No.</th>
                                                <th>Address</th>
                                                <th>Active</th>
                                                <th>Edit or Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="links-list" name="links-list">
                                            @foreach ($students as $student)
                                            <tr id="student{{$student->id}}">
                                                <!--<td><img src="{{ asset('passports/110.jpg') }}" alt="passport" height="50px" width = "50px"></td>-->
                                                <td>{{$student->RollNumber}}</td>
                                                <td>{{$student->FullName}}</td>
                                                <td>{{$student->Class}}</td>
                                                <!--<td>{{$student->email}}</td>-->
                                                <td>{{$student->Phone}}</td>
                                                <td>{{$student->Address}}</td>
                                                <td>{{$student->Active}}</td>
                                                <td>
                                                    <button class="btn btn-info open-modal" value="{{$student->id}}">Edit
                                                    </button>
                                                    <button class="btn btn-danger delete-student" value="{{$student->id}}">Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Roll Number</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <!--<th>Email</th>-->
                                                <th>Phone No.</th>
                                                <th>Address</th>
                                                <th>Active</th>
                                                <th>Edit or Delete</th>>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
    //alert('heloooooooolooolooooo')
    $(document).ready(function () {
        $('#example').DataTable();
    });

</script> 
@endsection