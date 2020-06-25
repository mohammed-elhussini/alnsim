@extends('website.layouts.master')
@section('script')
    <script type="text/javascript" src="website/assets/js/core/app.js"></script>
@endsection


@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="tab-content">
            <form method="POST"
                  action="{{route('sign')}}">
                @csrf
                <div class="form-group">
                    <label for="InputName">الأسم</label>
                    <input type="text"
                           class="form-control"
                           id="InputName"
                           name="name"
                           placeholder="الأسم">
                </div>
                @error('name')
                <div class="alert alert-danger border-0 alert-dismissible">
                    {{$errors->first('name')}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="InputEmail1">البريد الالكترونى</label>
                    <input type="email"
                           class="form-control"
                           id="InputEmail1"
                           name="email"
                           placeholder="البريد الالكترونى">
                </div>
                @error('email')
                <div class="alert alert-danger border-0 alert-dismissible">
                    {{$errors->first('email')}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="InputPassword">كلمة السر</label>
                    <input type="password"
                           class="form-control"
                           id="InputPassword"
                           name="password"
                           placeholder="Password">
                </div>
                @error('password')
                <div class="alert alert-danger border-0 alert-dismissible">
                    {{$errors->first('password')}}
                </div>
                @enderror

                <div class="form-group">
                    <label for="exampleInputFile">الصورة</label>
                    <input type="file"
                           id="exampleInputFile"
                           name="image">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                @error('image')
                <div class="alert alert-danger border-0 alert-dismissible">
                    {{$errors->first('image')}}
                </div>
                @enderror


                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="0"> ذكر
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="1"> أنثى
                    </label>
                </div>
                @error('gender')
                <div class="alert alert-danger border-0 alert-dismissible">
                    {{$errors->first('gender')}}
                </div>
                @enderror

                <div class="form-group">
                    <input class="selector form-control"
                           type="text"
                           placeholder="Select Date.."
                           name="birth_at"
                           data-input>
                </div>
                @error('birth_at')
                <div class="alert alert-danger border-0 alert-dismissible">
                    {{$errors->first('birth_at')}}
                </div>
                @enderror

                <button type="submit"
                        class="btn btn-default">
                    تسجيل
                </button>

            </form>
        </div>
    </div>
@endsection
