@extends('backend.master')
@section('title_a')
    <title>{{__("Class To Student")}}</title>
@endsection
@section('cus_style')
    <!-- Plugins css -->
    <link href="{{asset('backend/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css"/>

    <!--dataTables-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/libs/bootstrap-select/css/bootstrap-select.min.css')}}">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        </h5>
                        <form method="post" action="{{route('clasStudent.add')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">{{__("Class Name")}}</label>
                                        <select name="class_id" class="selectpicker" data-style="btn-outline-primary">
                                            <option value="0">Select Subject</option>
                                            @foreach($class as $key)
                                                <option value="{{$key->id}}">{{$key->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">{{__("Student Name")}}</label>
                                        <select name="student_id" class="selectpicker" data-style="btn-outline-primary">
                                            <option value="0">Select Student</option>
                                            @foreach($student as $key)
                                                <option value="{{$key->id}}">{{$key->student_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="ladda-button btn btn-primary" dir="ltr"
                                            data-style="expand-right">
                                        {{__("Add ")}}
                                    </button>
                                </div>
                            </div> <!-- end row -->
                            <!-- end row-->
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->

@endsection
@section('js')
    <!-- Plugins js -->
    <script src="{{asset('backend/libs/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('backend/libs/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('backend/js/pages/form-fileuploads.init.js')}}"></script>

    <!--dataTables-->
    <script type="text/javascript" charset="utf8"
            src="{{asset('backend/assets/js/dataTables.jqueryui.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('backend/assets/js/jquery.dataTables.js')}}"></script>

    <script src="{{asset('backend/assets/libs/bootstrap-select/js/bootstrap-select.min.js')}}"></script>


@endsection
