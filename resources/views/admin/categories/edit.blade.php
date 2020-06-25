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
                            تعديل بيانات القسم
                            :
                            {{$category->title}}
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
                              action="{{route('categories.update',$category->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>الأسم:</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{$category->title}}">
                                @error('name')
                                <div class="alert alert-danger border-0 alert-dismissible">
                                    {{$errors->first('name')}}
                                </div>
                                @enderror
                            </div>

                            {{--                            <div class="form-group">--}}
                            {{--                                <label>صلاحية:</label>--}}
                            {{--                                <select class="form-control form-control-select2" data-fouc>--}}
                            {{--                                    <optgroup label="Alaskan/Hawaiian Time Zone">--}}
                            {{--                                        <option value="AK">Alaska</option>--}}
                            {{--                                        <option value="HI">Hawaii</option>--}}
                            {{--                                    </optgroup>--}}
                            {{--                                    <optgroup label="Pacific Time Zone">--}}
                            {{--                                        <option value="CA">California</option>--}}
                            {{--                                        <option value="NV">Nevada</option>--}}
                            {{--                                        <option value="WA">Washington</option>--}}
                            {{--                                    </optgroup>--}}
                            {{--                                    <optgroup label="Mountain Time Zone">--}}
                            {{--                                        <option value="AZ">Arizona</option>--}}
                            {{--                                        <option value="CO">Colorado</option>--}}
                            {{--                                        <option value="WY">Wyoming</option>--}}
                            {{--                                    </optgroup>--}}
                            {{--                                    <optgroup label="Central Time Zone">--}}
                            {{--                                        <option value="AL">Alabama</option>--}}
                            {{--                                        <option value="AR">Arkansas</option>--}}
                            {{--                                        <option value="KY">Kentucky</option>--}}
                            {{--                                    </optgroup>--}}
                            {{--                                    <optgroup label="Eastern Time Zone">--}}
                            {{--                                        <option value="CT">Connecticut</option>--}}
                            {{--                                        <option value="DE">Delaware</option>--}}
                            {{--                                        <option value="FL">Florida</option>--}}
                            {{--                                    </optgroup>--}}
                            {{--                                </select>--}}
                            {{--                            </div>--}}


                            <div class="form-group">
                                <label>الصورة الشخصية:</label>
                                <img class="d-block img-thumbnail"
                                     src="{{asset($category->thumbnail)}}">
                                <input type="file"
                                       class="form-input-styled"
                                       name="image"
                                       data-fouc>
                                <span
                                    class="form-text text-muted">
                                    Accepted formats: gif, png, jpg. Max file size 2Mb
                                </span>
                                @error('image')
                                <div class="alert alert-danger border-0 alert-dismissible">
                                    {{$errors->first('image')}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>الوصف:</label>
                                <textarea class="form-control"
                                          name="description"
                                          placeholder="الوصف">
                                    {{$category->content}}
                                </textarea>
                                @error('description')
                                <div class="alert alert-danger border-0 alert-dismissible">
                                    {{$errors->first('description')}}
                                </div>
                                @enderror
                            </div>


                            <div class="form-check form-check-switchery form-check-switchery-double">
                                <label class="form-check-label">
                                    مفعل
                                    <input type="checkbox"
                                           class="form-check-input-switchery"
                                           name="pending"
                                           value=""

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
