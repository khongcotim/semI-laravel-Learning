<!-- ================================
    START HERO-WRAPPER AREA
================================= -->
<form action="{{route('tour_shop')}}" method="POST">
        @csrf
<section class="hero-wrapper">
    @if ($home_banner!= [])
        <div class="hero-box hero-bg" style="background-image: url('{{url('admin/images')}}/{{$home_banner!='null'?$home_banner:'hero-bg.jpg'}}')">
    @else
        <div class="hero-box hero-bg">
    @endif
        <span class="line-bg line-bg1"></span>
        <span class="line-bg line-bg2"></span>
        <span class="line-bg line-bg3"></span>
        <span class="line-bg line-bg4"></span>
        <span class="line-bg line-bg5"></span>
        <span class="line-bg line-bg6"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto responsive--column-l">
                    <div class="hero-content pb-5">
                        <div class="section-heading">
                            <h2 class="sec__title cd-headline zoom">
                                Amazing <span class="cd-words-wrapper">
                                <b class="is-visible">Tours</b>
                                <b>Adventures</b>
                                <b>Flights</b>
                                <b>Hotels</b>
                                <b>Cars</b>
                                <b>Cruises</b>
                                <b>Package Deals</b>
                                <b>Fun</b>
                                <b>People</b>
                                </span>
                                Waiting for You
                            </h2>
                        </div>
                    </div><!-- end hero-content -->

                    <div class="tab-content search-fields-container" id="myTabContent">
                        <div class="tab-pane fade show active" id="tour" role="tabpanel" aria-labelledby="tour-tab">
                            <div class="contact-form-action">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">Where would like to go?</label>
                                            <div class="form-group">
                                                <span class="la la-map-marker form-icon"></span>
                                                <input class="form-control" type="text" name='destination' placeholder="Destination, city, or region">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 pr-0">
                                        <div class="input-box">
                                            <label class="label-text">From</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text" name="from" >
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4">
                                        <div class="input-box">
                                            <label class="label-text">To</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text" name="to">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                </div>
                            </div>
                            <div class="advanced-wrap">
                                <a class="btn collapse-btn theme-btn-hover-gray font-size-15" data-toggle="collapse" href="#collapseSeven" role="button" aria-expanded="false" aria-controls="collapseSeven">
                                    Advanced search <i class="la la-angle-down ml-1"></i>
                                </a>
                                <div class="pt-3 collapse" id="collapseSeven">
                                    <div class="slider-range-wrap">

                                        <p>
                                            <label for="amountx">Price range:</label>
                                            <input type="text" class="amountx" name="price" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                        </p>

                                        <div class="slider-rangex"></div>
                                    </div><!-- end slider-range-wrap -->

                                </div>
                            </div>
                            <div class="btn-box pt-3">
                                <button type="submit" href="tour-search-result.html" class="theme-btn">Search Now</button>
                            </div>
                        </div><!-- end tab-pane -->
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path></svg>
    </div>
</section>
</form><!-- end hero-wrapper -->
<!-- ================================
    END HERO-WRAPPER AREA
================================= -->
@section('home-slider')
<script>
       $( function() {
    $( ".slider-rangex" ).slider({
      range: true,
      min: {{$priceMin}},
      max: {{$priceMax}},
      values: [ {{$price[1]}}, {{$price[2]}} ],
      slide: function( event, ui ) {
        $( ".amountx" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( ".amountx" ).val( "$" + $( ".slider-rangex" ).slider( "values", 0 ) +
      " - $" + $( ".slider-rangex" ).slider( "values", 1 ) );
  } );
  </script>
@stop
