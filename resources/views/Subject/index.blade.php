@extends('backend.master')
@section('title_a')
    <title>{{__("Subjects List")}}</title>
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Subjects List</h4>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Subjects Name</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $number = 0; ?>
                            @foreach($subject as $key)
                                <tr>
                                    <td>{{$number+1}}</td>
                                    <?php $number++; ?>
                                    <td>{{$key->subjects}}</td>
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
