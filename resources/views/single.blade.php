@extends('backend.master')
@section('title_a')
    <title>{{$student->student_name}}</title>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Student Info</h4>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Student Name</th>
                                <th>Student Father Name</th>
                                <th>Student Mother Name</th>
                            </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->student_name}}</td>
                                    <td>{{$student->student_father}}</td>
                                    <td>{{$student->student_mother}}</td>

                                </tr>

                            </tbody>

                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Report</h4>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Subject</th>
                                <th>Marks</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $number = 0; ?>
                            @foreach($data as $key)
                                <tr>
                                    <td>{{$number+1}}</td>
                                    <?php $number++;
                                    ?>
                                    <td>{{$key['subject_name']}}</td>
                                    <td>{{round($key['total_marks'])}}</td>
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

