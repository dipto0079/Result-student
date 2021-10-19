@extends('backend.master')
@section('title_a')
    <title>{{__("Class To Student")}}</title>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                    <h4 class="page-title">{{__("Class To Student")}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Class List</h4>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Student Name</th>
                            </tr>
                            </thead>
                            <tbody>
{{--{{dd($student_all)}}--}}
                            @foreach($student_all as $key)
                                <tr>
                                    <td>{{$key['student_id']}}</td>
{{--                                    <td>{{$key->student_name['student_name']}}</td>--}}
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
