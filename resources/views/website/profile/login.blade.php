@extends('website.layouts.master')
@section('script')
    <script type="text/javascript" src="website/assets/js/core/app.js"></script>
@endsection


@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="tab-content">
            <form method="post"
                  action="{{url('login')}}">
                @csrf
                <div class="form-group">
                    <label for="InputEmail1">البريد الالكترونى</label>
                    <input type="email"
                           class="form-control"
                           name="email"
                           id="InputEmail1"
                           placeholder="البريد الالكترونى">
                </div>
                <div class="form-group">
                    <label for="InputPassword">كلمة السر</label>
                    <input type="password"
                           class="form-control"
                           name="password"
                           id="InputPassword"
                           placeholder="Password">
                </div>
                <button type="submit"
                        class="btn btn-default">
                    تسجيل
                </button>
            </form>
        </div>
    </div>
@endsection
