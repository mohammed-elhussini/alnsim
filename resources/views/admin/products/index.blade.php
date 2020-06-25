@extends('admin.layouts.master')

@section('style')
    <!-- Theme JS files -->
    <script src="{{asset('admin/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('admin/js/app.js')}}"></script>
    <script src="{{asset('admin/js/demo_pages/datatables_advanced.js')}}"></script>
    <!-- /theme JS files -->
@endsection


@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Page length options -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Page length options</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <a href="{{route('products.create')}}"
                   type="button"
                   class="btn btn-primary btn-float btn-block legitRipple">
                    <i class="icon-pen-plus icon-2x"></i>
                    <span>إضافة منتج</span>
                </a>
            </div>

            <table class="table datatable-show-all">
                <thead>
                <tr>
                    <th>إسم المنتج</th>
                    <th>الصورة</th>
                    <th>وصف</th>
                    <th>الأقسام</th>
                    <th>الحالة</th>
                    <th>المؤلف</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td><img class="img-fluid" src="/{{$product->thumbnail}}"></td>
                        <td>{{$product->content}}</td>
                        <td>

                            @foreach ($product->categories as $cat)
                                {{$cat->title}}
                            @endforeach

                        </td>
                        <td>mmm</td>
                        <td>
                        <span class="badge badge-info">
                            Pending
                        </span>
                        </td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#"
                                       class="list-icons-item"
                                       data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right text-center">
                                        {{--                                        <a href="{{route('products.show',$product->id)}}"--}}
                                        {{--                                           class="dropdown-item">--}}
                                        {{--                                            <i class="icon-eye"></i>--}}
                                        {{--                                        </a>--}}
                                        <a href="{{route('products.show',$product->id)}}"
                                           class="dropdown-item">
                                            <i class="icon-eye"></i>
                                        </a>
                                        <a href="{{route('products.edit',$product->id)}}"
                                           class="dropdown-item">
                                            <i class="icon-pencil6"></i>
                                        </a>
                                        <form method="POST"
                                              action="{{route('products.destroy',$product->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button
                                                class="dropdown-item">
                                                <i class="icon-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /page length options -->
    </div>
    <!-- /content area -->
@endsection
