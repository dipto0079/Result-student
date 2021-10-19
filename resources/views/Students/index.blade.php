@extends('backend.master')
@section('title_a')
    <title>{{__("Student List")}}</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Student List</h4>


                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Student Name</th>
                                <th>Student Father Name</th>
                                <th>Student Mother Name</th>
                                <th>Student Email</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $number = 0; ?>
                            @foreach($student as $key)
                                <tr>
                                    <td>{{$number+1}}</td>
                                    <?php $number++; ?>
                                    <td>{{$key->student_name}}</td>
                                    <td>{{$key->student_father}}</td>
                                    <td>{{$key->student_mother}}</td>
                                    <td>
                                        {{$key->email}}
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
