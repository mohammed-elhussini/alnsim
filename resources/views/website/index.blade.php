@extends('website.layouts.master')
@section('script')
    <script type="text/javascript" src="website/assets/js/core/app.js"></script>
@endsection


@section('slider-home')
    @include('website.partials.slider-home')
@endsection

@section('content')

    <div class="row row-offcanvas row-offcanvas-right">
        @include('website.partials.sidebar-proCats')
        <div class="col-md-9">
            <p class=" visible-xs">
                <button type="button"
                        class="toggle_icon"
                        data-toggle="offcanvas">
                    <img src="{{asset('website/images/offcanvas.png')}}">
                </button>
            </p>
            <div class="clearfix"></div>

            <div class="lastProduct">
                <h4 class="secTit">المنتجات</h4>
                <div class="row">
                    @foreach($products as $pro)
                        <div class="col-md-4">
                            <div class="proItem">
                                <div class="proImg">
                                    <a href="{{url('/show-product/'.$pro->id)}}">
                                        <img class="img-responsive center-block"
                                             src="{{asset($pro->thumbnail)}}">
                                    </a>
                                </div>
                                <div class="proInfo text-center">
                                    <h3 class="proTit">
                                        <a href="{{url('/show-product/'.$pro->id)}}">
                                            {{$pro->title}}
                                        </a>
                                    </h3>
                                    <div class="">
                                        {!! Str::words($pro->content, 30) !!}
                                    </div>
                                    @foreach ($pro->categories as $cat)
                                        <a class="proCode"
                                           href="{{url('/category/'.$cat->id)}}">
                                            {{$cat->title}}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
