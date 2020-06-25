@extends('admin.layouts.master')

@section('style')
    <!-- Theme JS files -->
    <script src="{{asset('admin/js/app.js')}}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">

                <!-- Center alignment -->
                <div class="card text-center">
                    <div class="card-body">
                        <i class="icon-cross2 icon-2x text-danger border-danger border-3 rounded-round p-3 mb-3"></i>
                        <h5 class="card-title">Center alignment</h5>
                        <p class="mb-3">Use <code>.text-center</code> alignment utility class to center content horizontally. Responsive options are also available</p>

                        <a href="#" class="btn bg-danger-400 legitRipple">Read more <i class="icon-arrow-right14 ml-2"></i></a>
                    </div>
                </div>
                <!-- /center alignment -->


            </div>
        </div>
    </div>
@endsection
