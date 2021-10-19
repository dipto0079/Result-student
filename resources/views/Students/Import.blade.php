@extends('backend.master')
@section('title_a')
    <title>{{__("Add More")}}</title>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                    <h4 class="page-title">{{__("Add More")}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('import.add')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">{{__("Add File")}}</label>
                                        <input type="file" accept=".xlsx" placeholder="gududdgu" class="form-control"
                                               name="file" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="ladda-button btn btn-primary" dir="ltr"
                                            data-style="expand-right">
                                        {{__("Import")}}
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

