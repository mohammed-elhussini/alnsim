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
                        <h5 class="card-title">إضافة قسم جديد</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item"
                                   data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post"
                              action="{{route('categories.store')}}"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label>إسم القسم:</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       value="إسم"
                                       placeholder="أكتب اسمك بالكامل">
                            </div>


                            <div class="form-group">
                                <label>الوصف:</label>
                                <textarea
                                    class="form-control"
                                    name="description"
                                    placeholder="عن القسم">
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label>الصورة القسم :</label>
                                <input type="file"
                                       class="form-input-styled"
                                       name="image"
                                       data-fouc>
                                <span
                                    class="form-text text-muted">
                                    Accepted formats: gif, png, jpg. Max file size 2Mb
                                </span>

                            </div>


                            <div class="form-check form-check-switchery form-check-switchery-double">
                                <label class="form-check-label">
                                    مفعل
                                    <input type="checkbox"
                                           class="form-check-input-switchery"
                                           name="pending"
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


