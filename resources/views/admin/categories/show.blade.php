@extends('admin.layouts.master')
@section('style')
    <!-- Theme JS files -->
    <script src="{{asset('admin/js/plugins/editors/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin/js/plugins/media/fancybox.min.js')}}"></script>

    <script src="{{asset('admin/js/app.js')}}"></script>
    <script src="{{asset('admin/js/demo_pages/blog_single.js')}}"></script>
    <!-- /theme JS files -->
@endsection


@section('content')
    <!-- Content area -->
    <div class="content">

        <!-- Inner container -->
        <div class="d-flex align-items-start flex-column flex-md-row">

            <!-- Left content -->
            <div class="w-100 overflow-auto order-2 order-md-1">

                <!-- Post -->
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="mb-3 text-center">
                                <a href="#"
                                   class="d-inline-block">
                                    <img src="{{asset($category->thumbnail)}}"
                                         class="img-fluid"
                                         alt="{{$category->title}}">
                                </a>
                            </div>
                            <h4 class="font-weight-semibold mb-1">
                                <a href="#"
                                   class="text-default">
                                    {{$category->title}}
                                </a>
                            </h4>
                            <ul class="list-inline list-inline-dotted text-muted mb-3">
                                <li class="list-inline-item">
                                    {{ $category->created_at->format('m/d/Y')}}
                                </li>
                            </ul>

                            <div class="mb-3">
                                {{$category->content}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /post -->

            </div>
            <!-- /left content -->




        </div>
        <!-- /inner container -->

    </div>
    <!-- /content area --
@endsection
