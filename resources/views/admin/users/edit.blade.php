@extends('admin.layouts.master')


@section('style')
    {{--pickadate--}}
    <script src="{{asset('admin/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pickers/daterangepicker.js')}}"></script>
    {{--<script src="{{asset('admin/js/plugins/pickers/anytime.min.js')}}"></script>--}}
    <script src="{{asset('admin/js/plugins/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
    {{--<script src="{{asset('admin/js/plugins/pickers/pickadate/picker.time.js')}}"></script>--}}
    {{--<script src="{{asset('admin/js/plugins/pickers/pickadate/legacy.js')}}"></script>--}}
    {{--<script src="{{asset('admin/js/plugins/notifications/jgrowl.min.js')}}"></script>--}}

    {{--form--}}
    <script src="{{asset('admin/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/forms/styling/switch.min.js')}}"></script>

    <script src="{{asset('admin/js/app.js')}}"></script>
    <script src="{{asset('admin/js/demo_pages/form_checkboxes_radios.js')}}"></script>
    {{--pickadate--}}
    <script src="{{asset('admin/js/demo_pages/picker_date_rtl.js')}}"></script>
    {{--form--}}
    <script src="{{asset('admin/js/demo_pages/form_layouts.js')}}"></script>
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">

        <!-- Vertical form options -->
        <div class="row">
            <div class="col-md-12">

                <!-- Basic layout-->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">
                            تعديل بيانات العضو
                        :
                            {{$user->name}}
                        </h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item"
                                   data-action="collapse">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post"
                              action="{{route('users.update',$user->id)}}"
                              enctype="multipart/form-data">
                            {{-- action="{{url('users/'.$user->id)}}"--}}
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>الأسم:</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{$user->name}}">
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger border-0 alert-dismissible">
                                        {{$errors->get('name')[0]}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>كلمة السر:</label>
                                <input type="password"
                                       class="form-control"
                                       name="password"
                                       placeholder="سجل كلمة سر قوية">
                            </div>

                            <div class="form-group">
                                <label>البريد الإلكترونى:</label>
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{$user->email}}">
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger border-0 alert-dismissible">
                                        {{$errors->get('email')[0]}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>تاريخ ميلادك:</label>
                                <div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text">
                                                <i class="icon-calendar22"></i>
                                            </span>
										</span>
                                    <input type="text"
                                           class="form-control daterange-single"
                                           name="birth_at"
                                           value="{{ $user->created_at->format('m/d/Y')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="d-block">النوع:</label>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio"
                                               class="form-input-styled"
                                               name="gender"
                                               value="0"
                                               {{$user->gender == 0 ? 'checked' : ''}}
                                               data-fouc>
                                        ذكر
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio"
                                               class="form-input-styled"
                                               name="gender"
                                               value="1"
                                               {{$user->gender == 1 ? 'checked' : ''}}
                                               data-fouc>
                                        أنثى
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>الصورة الشخصية:</label>
                                <img class="d-block img-thumbnail"
                                     src="{{asset($user->image)}}">
                                <input type="file"
                                       class="form-input-styled"
                                       name="image"
                                       data-fouc>
                                <span
                                    class="form-text text-muted">
                                    Accepted formats: gif, png, jpg. Max file size 2Mb
                                </span>
                                @if ($errors->has('image'))
                                    <div class="alert alert-danger border-0 alert-dismissible">
                                        {{$errors->get('image')[0]}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-check form-check-switchery form-check-switchery-double">
                                <label class="form-check-label">
                                    أدمن
                                    <input type="checkbox"
                                           class="form-check-input-switchery"
                                           name="role"
                                           value="1"
                                           {{$user->role_id == 1 ? 'checked' : ''}}
                                           data-fouc>
                                    عضو
                                </label>
                            </div>

                            <div class="form-check form-check-switchery form-check-switchery-double">
                                <label class="form-check-label">
                                    مفعل
                                    <input type="checkbox"
                                           class="form-check-input-switchery"
                                           name="pending"
                                           value="1"
                                           {{$user->pending == 1 ? 'checked' : ''}}
                                           data-fouc>
                                    غير مفعل
                                </label>
                            </div>

                            <div class="text-right">
                                <button type="submit"
                                        class="btn btn-primary">
                                    تعديل البيانات
                                    <i class="icon-paperplane ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /basic layout -->
            </div>
        </div>
        <!-- /vertical form options -->
    </div>
    <!-- /content area -->
@endsection
