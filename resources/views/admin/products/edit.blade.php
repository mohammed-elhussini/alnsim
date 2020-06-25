@extends('admin.layouts.master')
@section('style')
    {{--form--}}
    <script src="{{asset('admin/js/plugins/forms/styling/uniform.min.js')}}"></script>

    {{--form--}}
    <script src="{{asset('admin/js/demo_pages/form_layouts.js')}}"></script>
    <script src="{{asset('admin/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/forms/styling/switch.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/editors/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('admin/js/app.js')}}"></script>
    <script src="{{asset('admin/js/demo_pages/form_select2.js')}}"></script>
    <script src="{{asset('admin/js/demo_pages/form_checkboxes_radios.js')}}"></script>
    <script src="{{asset('admin/js/demo_pages/editor_ckeditor_rtl.js')}}"></script>

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

                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Basic layout</h5>
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
                                  action="{{route('products.update',$product->id)}}"
                                  enctype="multipart/form-data">

                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>العنوان:</label>
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           value="{{$product->title}}">
                                    @if ($errors->has('title'))
                                        {{$errors->get('title')[0]}}
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label class="d-block">أقسام المتجر</label>
                                    <select multiple="multiple"
                                            class="form-control select-fixed-multiple"
                                            name="cats[]"
                                            data-fouc>

                                        @foreach ($cats as $cat)
                                            <option value="{{$cat->id}}"
                                                {{$product->categories->contains($cat->id) ? 'selected' : ''}} >
                                                {{$cat->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>صورة المنتج</label>
                                    <img class="d-block img-thumbnail"
                                         src="{{asset($product->thumbnail)}}">
                                    <input type="file"
                                           class="form-input-styled"
                                           name="photo"
                                           data-fouc>
                                    <span
                                        class="form-text text-muted">
                                    Accepted formats: gif, png, jpg. Max file size 2Mb
                                </span>
                                    @if ($errors->has('thumbnail'))
                                        {{$errors->get('thumbnail')[0]}}
                                    @endif
                                </div>

                                <div class="form-group">
                                    <textarea id="editor-full"
                                              rows="4"
                                              cols="4"
                                              name="description">
                                        {{$product->content}}
                                        </textarea>
                                    @if ($errors->has('content'))
                                        {{$errors->get('content')[0]}}
                                    @endif
                                </div>


                                <div class="form-check form-check-switchery form-check-switchery-double">
                                    <label class="form-check-label">
                                        مفعل
                                        <input type="checkbox"
                                               class="form-check-input-switchery"
                                               name="pending"
                                               value="1"
                                               {{$product->pending?'checked':''}}
                                               data-fouc>
                                        غير مفعل
                                    </label>
                                </div>

                                <div class="form-check form-check-switchery form-check-switchery-double">
                                    <label class="form-check-label">
                                        مثبت
                                        <input type="checkbox"
                                               class="form-check-input-switchery"
                                               name="featured"
                                               value="1"
                                               {{$product->featured?'checked':''}}
                                               data-fouc>
                                        غير مثبت
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
                </div>
                <!-- /post -->


            </div>
            <!-- /left content -->


            <!-- Right sidebar component -->


        </div>
        <!-- /inner container -->

    </div>
    <!-- /content area --
@endsection
