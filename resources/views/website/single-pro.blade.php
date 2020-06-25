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
            <h4 class="secTit">{{$product->title}}</h4>

            <div class="">
                مشاهدات :
                {{$product->views}}
            </div>
            <div class="">
                مثيت ام لا :
                {{$product->featured}}
            </div>

            <div class="">
                التاريخ :
                {{ $product->created_at->format('m/d/Y')}}
            </div>

            <div class="">
                مفعل ام لا :
                {{$product->pending}}
            </div>

            <div class="">
                اسم الناشر :
                {{$product->user->name}}
            </div>
            <div class="">
                القسم :
                @foreach($product->categories as $cat)
                    <a href="{{route('category',$cat->id)}}">
                        {{$cat->title}}
                    </a>
                    @if(!$loop->last)
                        ,
                    @endif
                @endforeach
            </div>

            <div class="lightGalleryArea row">
                <div id="lightgallery"
                     class="">
                    <a data-src="{{asset($product->thumbnail)}}"
                       data-sub-html="<h4>{{$product->title}}</h4>">
                        <img class="imgGallery img-responsive"
                             src="{{asset($product->thumbnail)}}">
                    </a>
                </div>
            </div>

            <div class="">
                {!! $product->content !!}
            </div>
        </div>
    </div>

@endsection



