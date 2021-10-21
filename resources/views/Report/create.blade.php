@extends('backend.master')
@section('title_a')
    <title>{{__("Marks Add")}}</title>
@endsection
@section('cus_style')
    <!-- Plugins css -->
    <link href="{{asset('backend/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css"/>

    <!--dataTables-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('backend/assets/libs/bootstrap-select/css/bootstrap-select.min.css')}}">
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                    <h4 class="page-title">{{__("Marks Add")}}</h4>
                </div>
            </div>
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                    <a href="{{route('Import.Report')}}" class="page-title badge-danger">{{__("Import Report")}}</a>
                </div>
            </div>
        </div>
        <form method="post" action="{{route('add.subject')}}" enctype="multipart/form-data">
        @csrf
        <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">{{__("Select Class")}}</label>
                                        <select id="select_student" class="selectpicker"
                                                data-style="btn-outline-primary" name="class_id">
                                            <option value="0">Select Class</option>
                                            @foreach($class_name as $key)
                                                <option value="{{$key->id}}">{{$key->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">{{__("Student Name")}}</label>
                                        <select id="student"  name="student_id"  >
{{--                                            class="selectpicker"--}}
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                            <!-- end row-->

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @if(!empty($subject))
                                    @foreach ($subject as $key)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname">{{$key->subjects}}</label>
                                                <input type="hidden" name="subject_id[]" value="{{$key->id}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <input type="number" name="total_marks[]" class="form-control"
                                                       placeholder="Enter Mark" min="0" max="100">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
            <div class="col-md-12">
                <button type="submit" class="ladda-button btn btn-primary" dir="ltr"
                        data-style="expand-right">
                    {{__("Add")}}
                </button>
            </div>

        </form>
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

    <script type=text/javascript>
        $('#select_student').change(function () {
            var classs_Id = $(this).val();
            if (classs_Id) {
                $.ajax({
                    type: "GET",
                    url: "{{url('selectstudent')}}/" + classs_Id,
                    success: function (res) {
                        console.log(res);
                        if (res) {
                            $("#student").empty();
                            $("#student").append('<option>Select Student</option>');
                            $.each(res, function (key, value) {
                                $("#student").append('<option value="' + key + '">' + value + '</option>');
                            });

                        } else {
                            $("#student").empty();
                        }
                    }
                });
            } else {
                $("#student").empty();
            }
        });
    </script>





@endsection
