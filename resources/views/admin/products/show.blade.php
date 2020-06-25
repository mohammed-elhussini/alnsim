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
                                <a href="#" class="d-inline-block">
                                    <img src="/{{$product->thumbnail}}"
                                         class="img-fluid"
                                         alt="">
                                </a>
                            </div>

                            <h4 class="font-weight-semibold mb-1">
                                <a href="#"
                                   class="text-default">
                                    {{$product->title}}
                                </a>
                            </h4>

                            <ul class="list-inline list-inline-dotted text-muted mb-3">
                                <li class="list-inline-item">By
                                    <a href="#" class="text-muted">المؤلف</a>
                                </li>
                                <li class="list-inline-item">
                                    {{ $product->created_at->format('m/d/Y')}}
                                </li>
                            </ul>

                            <div class="mb-3">
{{--                                {{$product->content}}--}}
                                {!! $product->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /post -->

            </div>
            <!-- /left content -->


            <!-- Right sidebar component -->
            <div
                class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

                <!-- Sidebar content -->
                <div class="sidebar-content">

                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="card-title font-weight-semibold">Categories</span>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="badge d-block badge-success {{$product->featured ?'badge-success':'badge-danger'}}">
                                {{$product->featured ?'مثبت':'غير مثبت'}}
                            </div>

                            <div class="badge d-block badge-success {{$product->pending ?'badge-success':'badge-danger'}}">
                                {{$product->pending ?'مفعل':'مفعل مثبت'}}
                            </div>


                        </div>
                    </div>
                    <!-- Categories -->
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="card-title font-weight-semibold">Categories</span>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="nav nav-sidebar my-2">

                                @foreach ($product->categories as $cat)
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="icon-wordpress"></i>
                                            {{$cat->title}}

                                            <span class="text-muted font-size-sm font-weight-normal ml-auto">
                                                    {{$cat->products->count()}}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- /categories -->

                </div>
                <!-- /sidebar content -->

            </div>
            <!-- /right sidebar component -->

        </div>
        <!-- /inner container -->

    </div>
    <!-- /content area --
@endsection
