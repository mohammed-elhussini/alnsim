<div id="sidebar"
     class="col-md-3 sidebar-offcanvas">
    <aside class="productsCat">
        <h4 class="secTit">
            <i class="fa fa-align-right"></i>
            الاقسام
        </h4>
        <ul class="list-unstyled">
            @foreach($categories as $cat)
                <li>
                    <a href="{{route('category',$cat->id)}}">
                        {{$cat->title}}
                        -
                        {{$cat->products->count()}}
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>
</div>
