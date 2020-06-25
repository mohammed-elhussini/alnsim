@extends('website.layouts.master')

@section('content')
    @include('website.partials.sidebar-proCats')
    <div class="col-md-9">
        <p class=" visible-xs">
            <button type="button"
                    class="toggle_icon"
                    data-toggle="offcanvas">
                <img src="{{asset('images/offcanvas.png')}}">
            </button>
        </p>
        <div class="clearfix"></div>
        <div class="lastProduct">
            <h4 class="secTit">
                {{$category->title}}
                -
                {{$category->products_count}}
            </h4>

            <img class="img-responsive"
                 src="{{asset($category->thumbnail)}}">
            <hr>
            <div class="">
                {{$category->content}}
            </div>
            <hr>
            <div class="row">
                @foreach($products as $product )
                    <div class="col-md-4">
                        <div class="proItem">
                            <div class="proImg">
                                <a href="{{url('/show-product/'.$product->id)}}">
                                    <img class="img-responsive center-block"
                                         src="{{asset($product->thumbnail)}}">
                                </a>
                            </div>
                            <div class="proInfo text-center">
                                <h3 class="proTit">
                                    <a href="{{url('/show-product/'.$product->id)}}">
                                        {{$product->title}}
                                    </a>
                                </h3>
                                @foreach( $product->categories as $cat)
                                    <a class="proCode"
                                       href="{{route('category',$cat->id)}}">
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
@endsection
