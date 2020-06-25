<section class="slider">
    <!-- Slider Section -->
    <div id="main-slider"
         class="carousel carousel-fade slide"
         data-ride="carousel">
        <!-- Indicators -->
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{asset('website/images/slide-1.png')}}"
                     alt="Slider Image One">
            </div>
            <div class="item">
                <img src="{{asset('website/images/slide-1.png')}}"
                     alt="Slider Image One">
            </div>
            <div class="item">
                <img src="{{asset('website/images/slide-1.png')}}"
                     alt="Slider Image Two">
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control"
           href="#main-slider"
           role="button"
           data-slide="prev">
            <span class="fa fa fa-angle-double-left"
                  aria-hidden="true">
            </span>
        </a>
        <a class="right carousel-control"
           href="#main-slider"
           role="button"
           data-slide="next">
            <span class="fa fa-angle-double-right"
                  aria-hidden="true">
            </span>
        </a>
    </div>
</section>
