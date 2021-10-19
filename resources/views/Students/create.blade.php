@extends('backend.master')
@section('title_a')
    <title>{{__("Student Add")}}</title>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                    <h4 class="page-title">{{__("Student Info")}}</h4>
                </div>
            </div>
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                    <a href="{{route('import.more')}}" class="page-title badge-danger">{{__("Import Student")}}</a>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        </h5>
                        <form method="post" action="{{route('students.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">{{__("Students Name")}}</label>
                                        <input type="text" class="form-control" name="student_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">{{__("Students Father Name")}}</label>
                                        <input type="text" class="form-control" name="student_father" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">{{__("Students Mother Name")}}</label>
                                        <input type="text" class="form-control" name="student_mother" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">{{__("Email")}}</label>
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="ladda-button btn btn-primary" dir="ltr"
                                            data-style="expand-right">
                                        {{__("Add")}}
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
    <script type="text/javascript" charset="utf8" src="{{asset('backend/assets/js/dataTables.jqueryui.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('backend/assets/js/jquery.dataTables.js')}}"></script>


@endsection
