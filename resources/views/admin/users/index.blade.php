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

        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="icon-cross2 icon-2x text-danger border-danger border-3 rounded-round p-3 mb-3"></i>
                        <h5 class="card-title">عدد الأعضاء</h5>
                        <p class="mb-3">{{ $users->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="card text-center">
                    <div class="card-body">
                        <i class="icon-cross2 icon-2x text-danger border-danger border-3 rounded-round p-3 mb-3"></i>
                        <h5 class="card-title">عدد الأعضاء المفعلين</h5>
                        <p class="mb-3">
                            <a href="{{route('users.index',['pending' => 'active'])}}">
{{--                                {{ $users->where('pending',1)->count()}}--}}
                            {{ App\Models\User::where('pending',1)->count() }}
                        </a>
                    </p>
{{--                        <p class="mb-3">{{ App\Models\User::where('pending',1)->count() }}</p>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="{{route('users.index',['pending' => 'disable'])}}">
                        <i class="icon-cross2 icon-2x text-danger border-danger border-3 rounded-round p-3 mb-3"></i>
                        <h5 class="card-title">عدد الأعضاء غير المفعلين</h5>
                        <p class="mb-3">
{{--                            {{ $users->where('pending',0)->count()}}--}}
                            {{ App\Models\User::where('pending',0)->count() }}
                        </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">الأعضاء</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <a href="{{route('users.create')}}"
                   type="button"
                   class="btn btn-primary btn-float btn-block legitRipple">
                    <i class="icon-user-plus icon-2x"></i>
                    <span>إضافة عضو</span>
                </a>
            </div>

            <table class="table datatable-show-all">
                <thead>
                <tr>
                    <th>الأسم</th>
                    <th>البريد الألكترونى</th>
                    <th>النوع</th>
                    <th>الحالة</th>
                    <th>عدد المنتجات</th>
                    <th>تاريخ الأضافة</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->gender == 0 ? 'ذكر' : 'إنثى'}}</td>
                        <td>
                        <span class="badge badge-info">
                            {{$user->pending == 0 ? 'غيرمفعل' : 'مفعل'}}
                        </span>
                        </td>
                        <td>
                        <span class="badge badge-info">
                            هنا عدد المنتجات التى اضافها
                        </span>
                        </td>
                        <td>
                        <span class="badge badge-info">
                            {{ $user->created_at->format('m/d/Y')}}
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
                                        <a href="{{url('dashboard/users/'.$user->id.'/edit')}}"
                                           class="dropdown-item">
                                            <i class="icon-pencil6"></i>
                                        </a>
                                        <form method="POST"
                                              action="{{route('users.destroy',$user->id)}}">
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


