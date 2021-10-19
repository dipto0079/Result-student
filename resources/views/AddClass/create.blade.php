@extends('backend.master')
@section('title_a')
    <title>{{__("Add Class")}}</title>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                    <h4 class="page-title">{{__("Class Add")}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        </h5>
                        <form method="post" action="{{route('classes.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">{{__("Class Name")}}</label>
                                        <input type="text" class="form-control" name="class_name"  required>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Class List</h4>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Class Name</th>
                                <th>Total Student</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $number = 0; ?>
                            @foreach($Class as $key)
                                <tr>
                                    <td>{{$number+1}}</td>
                                    <?php $number++;
                                    ?>
                                    <td>{{$key->class_name}}</td>
                                    @php
                                    $total=\App\Models\AllClass::where('class_id',$key->id)->groupBy('class_id')->count('student_id');
                                    @endphp
                                    <td>{{$total}}</td>
                                    <td>
                                        <a href="{{route('single.class',$key->id)}}" role="button" class="btn btn-danger">Detail</a>
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
