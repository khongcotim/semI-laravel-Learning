@extends('customer.master.master_two')
@section('main')
@section('title','All Tour')
@section('tour','activate')


<section class="card-area section--padding" id="divDatalist">
    <div class="container">
    <form action="{{route('tour_shop')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-wrap margin-bottom-30px">

                    <div class="filter-bar d-flex align-items-center justify-content-between">
                        <div class="filter-bar-filter d-flex flex-wrap align-items-center">
                            <div class="filter-option">
                                <h3 class="title font-size-16">Filter by: @if(Session::has('scroll')) have @endif</h3>
                            </div>
                            <div class="filter-option">
                                <div class="dropdown dropdown-contain">
                                    <a class="dropdown-toggle dropdown-btn dropdown--btn" href="#" role="button" data-toggle="dropdown">
                                        Filter Price
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-wrap">
                                        <div class="dropdown-item">
                                            <div class="slider-range-wrap">

                                                <p>
                                                <label for="amountx">Price range:</label>
                                                <input type="text" class="amountx" name="price" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                                </p>

                                                <div class="slider-rangex"></div>
                                            </div><!-- end slider-range-wrap -->
                                            <div class="btn-box pt-4">
                                                <button class="theme-btn theme-btn-small theme-btn-transparent" type="submit">Apply</button>
                                            </div>
                                        </div><!-- end dropdown-item -->
                                    </div><!-- end dropdown-menu -->
                                </div><!-- end dropdown -->
                            </div>
                            <div class="filter-option">
                                <div class="dropdown dropdown-contain">
                                    <a class="dropdown-toggle dropdown-btn dropdown--btn" href="#" role="button" data-toggle="dropdown">
                                        Review Score
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-wrap">
                                        <div class="dropdown-item">
                                            <div class="checkbox-wrap">
                                                <div class="custom-checkbox">
                                                    <input type="checkbox" id="r1" name="rate5" value="check" onchange="this.form.submit()" {{$rate5}}>
                                                    <label for="r1">
                                                        <span class="ratings d-flex align-items-center">
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <span class="color-text-3 font-size-13 ml-1">({{$total_rate_per_star[5]}})</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="custom-checkbox">
                                                    <input type="checkbox" id="r2" name="rate4" value="check" onchange="this.form.submit()" {{$rate4}}>
                                                    <label for="r2">
                                                        <span class="ratings d-flex align-items-center">
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star-o"></i>
                                                            <span class="color-text-3 font-size-13 ml-1">({{$total_rate_per_star[4]}})</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="custom-checkbox">
                                                    <input type="checkbox" id="r3" name="rate3" value="check" onchange="this.form.submit()" {{$rate3}}>
                                                    <label for="r3">
                                                        <span class="ratings d-flex align-items-center">
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <span class="color-text-3 font-size-13 ml-1">({{$total_rate_per_star[3]}})</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="custom-checkbox">
                                                    <input type="checkbox" id="r4" name="rate2" value="check" onchange="this.form.submit()" {{$rate2}}>
                                                    <label for="r4">
                                                        <span class="ratings d-flex align-items-center" >
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <span class="color-text-3 font-size-13 ml-1">({{$total_rate_per_star[2]}})</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="custom-checkbox">
                                                    <input type="checkbox" id="r5" name="rate1" value="check" onchange="this.form.submit()" {{$rate1}}>
                                                    <label for="r5">
                                                        <span class="ratings d-flex align-items-center" >
                                                            <i class="la la-star"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <i class="la la-star-o"></i>
                                                            <span class="color-text-3 font-size-13 ml-1">({{$total_rate_per_star[1]}})</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div><!-- end dropdown-item -->
                                    </div><!-- end dropdown-menu -->
                                </div><!-- end dropdown -->
                            </div>
                            <div class="filter-option">
                                <div class="dropdown dropdown-contain">
                                    <a class="dropdown-toggle dropdown-btn dropdown--btn" href="#" role="button" data-toggle="dropdown">
                                        Categories
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-wrap">
                                        <div class="dropdown-item">
                                            <div class="checkbox-wrap">
                                                @foreach($cate as $value)
                                                <div class="custom-checkbox">
                                                    <input type="checkbox" id="catChb{{$value->id}}" name="cate[]" value="{{$value->id}}" onchange="this.form.submit()" @foreach($category as $c) @if($c==$value->id) checked @endif @endforeach>
                                                    <label for="catChb{{$value->id}}">{{$value->name}} ({{$total_tour_per_cate[$value->id]}})</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div><!-- end dropdown-item -->
                                    </div><!-- end dropdown-menu -->
                                </div><!-- end dropdown -->
                            </div>
                        </div><!-- end filter-bar-filter -->
                        <div class="select-contain">
                            <select class="select-contain-select" name="sorted" onchange="this.form.submit()">
                                @if($sorted == 1 )<option value="1" selected>Short by default</option> @else <option value="1">Short by default</option>@endif
                                @if($sorted == 2 ) <option value="2" selected>New Tour</option> @else  <option value="2">New Tour</option>@endif
                                @if($sorted == 3 ) <option value="3" selected>Price: low to high</option> @else  <option value="3">Price: low to high</option>@endif
                                @if($sorted == 4 ) <option value="4" selected>Price: high to low</option> @else  <option value="4">Price: high to low</option>@endif
                                @if($sorted == 5 ) <option value="5" selected>A to Z</option> @else  <option value="5">A to Z</option>@endif
                            </select>
                        </div><!-- end select-contain -->
                    </div><!-- end filter-bar -->
                </div><!-- end filter-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->

        </form>
        <div class="row">

            <div class="col-lg-4">
                <div class="sidebar mt-0">
                     <form action="{{route('tour_shop')}}" method="POST">
                        @csrf
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Where would like to go?</h3>
                        <div class="sidebar-widget-item">
                            <div class="contact-form-action">

                                    <div class="input-box">
                                        <label class="label-text">Departure</label>
                                        <div class="form-group">
                                            <span class="la la-map-marker form-icon"></span>
                                            <input class="form-control" type="text" placeholder="Destination, city, or region" name="departure" value="{{$departure}}">
                                        </div>
                                    </div>
                                    <div class="input-box">
                                        <label class="label-text">Destination</label>
                                        <div class="form-group">
                                            <span class="la la-map-marker form-icon"></span>
                                            <input class="form-control" type="text" placeholder="Destination, city, or region" name="destination" value="{{$destination}}">
                                        </div>
                                    </div>
                                    <div class="input-box">

                                        <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                        <label class="label-text">Travel time</label>
                                            <div class="qtyBtn d-flex align-items-center">
                                                <div class="qtyDec"><i class="la la-minus"></i></div>
                                                <input type="text" name="time" value="{{$time}}">
                                                <div class="qtyInc"><i class="la la-plus"></i></div>
                                            </div>
                                        </div><!-- end qty-box -->
                                    </div>
                            </div>
                        </div><!-- end sidebar-widget-item -->
                        <div class="btn-box pt-2">
                            <button class="theme-btn" onclick="this.form.submit()">Search Now</button>
                        </div>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Filter by Price</h3>
                        <div class="sidebar-price-range">
                            <div class="main-search-input-item">

                                <p>
                                <label for="amountx">Price range:</label>
                                <input type="text" class="amountx" name="price" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                </p>

                                <div class="slider-rangex"></div>
                            </div><!-- end main-search-input-item -->
                            <div class="btn-box pt-4">
                                <button class="theme-btn theme-btn-small theme-btn-transparent" type="submit">Apply</button>
                            </div>
                        </div>
                    </div><!-- end sidebar-widget -->

                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Filter by Rating</h3>
                        <div class="sidebar-review">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="s1" name="rate5" value="check" onchange="this.form.submit()" {{$rate5}}>
                                <label for="s1">
                                    <span class="ratings d-flex align-items-center" >
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <span class="color-text-3 font-size-13 ml-1">({{$total_rate_per_star[5]}})</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="s2" name="rate4" value="check" onchange="this.form.submit()" {{$rate4}}>
                                <label for="s2">
                                    <span class="ratings d-flex align-items-center" >
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <span class="color-text-3 font-size-13 ml-1">({{$total_rate_per_star[4]}})</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="s3" name="rate3" value="check" onchange="this.form.submit()" {{$rate3}}>
                                <label for="s3">
                                    <span class="ratings d-flex align-items-center" >
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <span class="color-text-3 font-size-13 ml-1">({{$total_rate_per_star[3]}})</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" id="s4" name="rate2" value="check" onchange="this.form.submit()" {{$rate2}}>
                                <label for="s4">
                                    <span class="ratings d-flex align-items-center" >
                                        <i class="la la-star"></i>
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <span class="color-text-3 font-size-13 ml-1">({{$total_rate_per_star[2]}})</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-checkbox mb-0">
                                <input type="checkbox" id="s5" name="rate1" value="check" onchange="this.form.submit()" {{$rate1}}>
                                <label for="s5">
                                    <span class="ratings d-flex align-items-center" >
                                        <i class="la la-star"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <i class="la la-star-o"></i>
                                        <span class="color-text-3 font-size-13 ml-1">({{$total_rate_per_star[1]}})</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="title stroke-shape">Categories</h3>
                        <div class="sidebar-category">
                        @foreach($cate as $value)
                            <div class="custom-checkbox">
                                <input type="checkbox" id="catChb{{$value->id}}" name="cate[]" value="{{$value->id}}" onchange="this.form.submit()" @foreach($category as $c) @if($c==$value->id) checked @endif @endforeach>
                                <label for="catChb{{$value->id}}">{{$value->name}} ({{$total_tour_per_cate[$value->id]}})</label>
                            </div>
                        @endforeach


                        </div>
                    </div><!-- end sidebar-widget -->

                </form>
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
            {{-- {!! Session::has('scroll') ? Session::get("scroll") : 0 !!} --}}
            <div class="col-lg-8">
                        <div class="form-box">

                            @foreach($tour as $value)

                            <div class="form-content pb-2">
                                <div class="card-item card-item-list ">
                                    <div class="card-item justify-content-between d-flex align-items-center p-2">
                                        <?php $fCheck=0 ?>
                                        @foreach($favorite as $favor)
                                        @if($favor->id_tour==$value->id)
                                        <form action="{{route('favorite.destroy',$value->id)}}" method="post">
                                        @method("DELETE")
                                        @csrf
                                        <input id="Y" type="hidden" name ="Y" runat="server" value="{!! Session::has('scroll') ? Session::get("scroll") : 0 !!}" />
                                            <button  type="submit" style="background: none;border: none;">
                                                <i style="color:red" class="las la-heart"></i>
                                            </button>
                                        </form>
                                        <?php $fCheck=1 ?>
                                        @endif
                                        @endforeach
                                        @if($fCheck==0)
                                        <form action="{{route('favorite.store')}}" method="post">
                                            @method("POST")
                                            @csrf
                                            <input id="Y" type="hidden" name ="Y" runat="server" value="{!! Session::has('scroll') ? Session::get("scroll") : 0 !!}" />
                                            <input type="hidden" name="id"  class="form-control" value="{{$value->id}}">
                                        <button type="submit" style="background: none;border: none;">
                                            <i style="color:red" class="lar la-heart"></i>
                                        </button>
                                        </form>
                                        @endif
                                    </div>
                                    <div class="card-img">
                                        <a href="{{route('tour_detail',$value->slug)}}" class="d-block">
                                            <img src="{{ url('customers') }}/images/{{$value->image}}" alt="{{$value->image}}">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{route('tour_detail',$value->slug)}}">{{$value->name}}</a></h3>
                                        <p class="card-meta">{{$value->from}} – {{$value->to}}</p>
                                        <div class="card-rating">
                                        <span class="badge text-white"><?php $check=0 ?>@foreach($rating as $rate)  @if(!empty($rating[$value->id]))  {{$rating[$value->id]}} @break @else <?php $check++ ?> @endif @endforeach @if($check!=0) 0 @endif /5</span>
                                            <span class="review__text">Average</span>
                                            <span class="rating__text"><?php $check=0 ?>(@foreach($review as $r)  @if(!empty($review[$value->id]))   {{$review[$value->id]}} @break @else <?php $check++ ?> @endif  @endforeach @if($check!=0) 0 @endif Reviews)</span>
                                        </div>
                                        <div class="card-price d-flex align-items-center justify-content-between">
                                            <p>
                                                <span class="price__from">From</span>
                                                <span class="price__num">{{number_format($value->price)}}$</span>
                                            </p>
                                            <p>

                                                <span class="price__num">{{$value->time}} Day</span>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div><!-- end form-box -->
                        <div class="col-lg-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    {{$tour->appends($_GET)}}
                                </ul>
                            </nav>
                        </div>
                    </div><!-- end col-lg-8 -->

        </div><!-- end row -->
        <div class="row">
        </div>
    </div><!-- end container -->
</section><!-- end card-area -->
<script type="text/javascript">

    function getScrollPosition()
    {
        var y;
            y = document.documentElement.scrollTop;
        document.getElementById('Y').value = y;

    }
    function setScrollPosition()
    {
        var y = document.getElementById('Y').value;
            document.documentElement.scrollTop = {{ Session::has('scroll') ? Session::get("scroll") : 0 }};

    }

   window.setInterval('getScrollPosition()', 350);
   window.onload = setScrollPosition();
</script>


@stop
@section('slider-js')
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
