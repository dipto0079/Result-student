@extends('backend.master')
@section('title_a')
    <title>{{__("Student Report")}}</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Student Report</h4>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total Marks</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $number = 0; ?>
                            @foreach($student as $key)
                            <tr>
                                <td>{{$number+1}}</td>
                                <?php $number++;
                                ?>
                                <td>{{$key->student->student_name}}</td>
                                <td>{{round($key->sum)}}</td>
                                <td>
                                    <a href="{{route('student.single',$key->student_id)}}" role="button" class="btn btn-danger">Detail</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </div> <!-- container -->
@endsection
@section('js')



@endsection
