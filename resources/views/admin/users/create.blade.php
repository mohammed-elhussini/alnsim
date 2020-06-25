@extends('admin.layouts.master')


@section('style')
    {{--pickadate--}}
    <script src="{{asset('admin/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pickers/anytime.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('admin/js/plugins/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{asset('admin/js/plugins/notifications/jgrowl.min.js')}}"></script>

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

    <script src="{{asset('admin/js/custom.js')}}"></script>

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
                        <h5 class="card-title">إضافة عضو جديد</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item"
                                   data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post"
                              action="{{route('users.store')}}"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label>الأسم:</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{old('name')}}"
                                       placeholder="أكتب اسمك بالكامل">


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
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger border-0 alert-dismissible">
                                        {{$errors->get('password')[0]}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>البريد الإلكترونى:</label>
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       placeholder="أدخل بريدك الألكترونى">
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
                                           name="birth_at">
                                    @if ($errors->has('birth_at'))
                                        <div class="alert alert-danger border-0 alert-dismissible">
                                            {{$errors->get('birth_at')[0]}}
                                        </div>
                                    @endif
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
                                               checked data-fouc>
                                        ذكر
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio"
                                               class="form-input-styled"
                                               name="gender"
                                               value="1"
                                               data-fouc>
                                        أنثى
                                    </label>
                                </div>

                                @if ($errors->has('gender'))
                                    <div class="alert alert-danger border-0 alert-dismissible">
                                        {{$errors->get('gender')[0]}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>الصورة الشخصية:</label>
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
                                           data-fouc>
                                    غير مفعل
                                </label>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    إضافة
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


