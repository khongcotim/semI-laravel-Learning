@extends('customer.master.master_two')
@section('main')
@section('title', 'Cart')
@section('cart', 'activate')

<!-- ================================
    START BREADCRUMB AREA
================================= -->
@if ($cart_banner != null)
    <section class="breadcrumb-area bread-bg-10"
        style="background-image: url('{{ url('admin/images') }}/{{ $cart_banner != null }}')">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content text-center">
                            <div class="section-heading">
                                <h2 class="sec__title text-white">{{ $cart_banner->title }}</h2>
                            </div>
                            <span class="arrow-blink">
                                <i class="la la-arrow-down"></i>
                            </span>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg-box">
            <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10"
                preserveAspectRatio="none">
                <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
            </svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
@else
    <section class="breadcrumb-area bread-bg-10">
        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content text-center">
                            <div class="section-heading">
                                <h2 class="sec__title text-white">Cart</h2>
                            </div>
                            <span class="arrow-blink">
                                <i class="la la-arrow-down"></i>
                            </span>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumb-wrap -->
        <div class="bread-svg-box">
            <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10"
                preserveAspectRatio="none">
                <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
            </svg>
        </div><!-- end bread-svg -->
    </section><!-- end breadcrumb-area -->
@endif

<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START CART AREA
================================= -->
<section class="cart-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('add_order') }}" method="POST">
                    @csrf
                    <div class="cart-wrap">
                        <div class="table-form table-responsive mb-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Total price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($cart) == 0)
                                        <tr>
                                            <h1>You don't have any tour in cart, <a
                                                    href="{{ route('tour_shop') }}">shopping now!</a></h1>
                                        </tr>
                                    @endif
                                    @foreach ($cart as $value)
                                        <tr>
                                            <td>
                                                @if (count($tour_guides) != 0)
                                                    @foreach ($tour_guides as $tour_guides_check)
                                                        @if ($value->id_tour_guild != $tour_guides_check->id)
                                                            <div class="choose mr-3">
                                                                <input type="checkbox" name="check[]"
                                                                    value='{{ $value->cart_id }}'
                                                                    id="cart-id-{{ $value->cart_id }}"
                                                                    price="{{ number_format($value->total_price) }}"
                                                                    onchange="setPrice()">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <div class="choose mr-3">

                                                        <input type="checkbox" name="check[]"
                                                            value='{{ $value->cart_id }}'
                                                            id="cart-id-{{ $value->cart_id }}"
                                                            price="{{ number_format($value->total_price) }}" onchange="setPrice()">
                                                    </div>
                                                @endif
                                            </td>
                                            <th scope="row">
                                                <div class="table-content product-content d-flex align-items-center">
                                                    <a href="room-details.html" class="d-block">
                                                        <img src="{{ url('customers') }}/images/{{ $value->tour_image }}"
                                                            alt="" class="flex-shrink-0">
                                                    </a>
                                                    <div class="product-content">
                                                        <a href="room-details.html"
                                                            class="title">{{ $value->tour }}</a>
                                                        <div class="product-info-wrap">
                                                            <div class="product-info line-height-24">
                                                                <span class="product-info-label">Travel time:</span>
                                                                <span class="product-info-value">
                                                                    <span
                                                                        class="product-check-in">{{ $value->travel_time }}</span>
                                                                    <!-- <span class="product-mark">/</span>
                                                            <span class="product-check-out">July 13, 2020</span>
                                                            <span class="product-nights">(1 night)</span> -->
                                                                </span>
                                                            </div><!-- end product-info -->
                                                            <div class="product-info line-height-24">
                                                                <span class="product-info-label">Guests:</span>
                                                                <span class="product-info-value">{{ $value->adults }}
                                                                    Adults, {{ $value->children }} Children</span>
                                                            </div><!-- end product-info -->
                                                            @if ($value->id_service != null)
                                                                <div class="product-info line-height-24">
                                                                    <span class="product-info-label">Extra
                                                                        Services:</span>
                                                                    <span
                                                                        class="product-info-value">@foreach (json_decode($value->id_service) as $valueService) @foreach ($service as $services) @if ($valueService == $services->id) {{ $services->name }}, @endif @endforeach @endforeach</span>
                                                                </div><!-- end product-info -->
                                                            @endif
                                                            @if ($value->id_discount != null)
                                                                <div class="product-info line-height-24">
                                                                    <span class="product-info-label">Discount
                                                                        code:</span>
                                                                    <span
                                                                        class="product-info-value">@foreach ($code as $valCode) @if ($value->id_discount == $valCode->id) Reduce {{ $valCode->percent_reduce }}% @endif @endforeach</span>
                                                                </div><!-- end product-info -->
                                                            @endif
                                                            @if ($value->id_vehicle != null)
                                                                <div class="product-info line-height-24">
                                                                    <span class="product-info-label">Vehicle:</span>
                                                                    <span
                                                                        class="product-info-value">@foreach ($vehicle as $valVhicle) @if ($value->id_vehicle == $valVhicle->id) {{ $valVhicle->name }} @endif @endforeach</span>
                                                                </div><!-- end product-info -->
                                                            @endif
                                                            @if ($value->hotel_id != null)
                                                                <div class="product-info line-height-24">
                                                                    <span class="product-info-label">Hotel:</span>
                                                                    <span
                                                                        class="product-info-value">@foreach ($hotel as $valHotel) @if ($value->hotel_id == $valHotel->id) {{ $valHotel->name }} @endif @endforeach</span>
                                                                </div><!-- end product-info -->
                                                            @endif
                                                            @if ($value->id_tour_guild != null)
                                                                <div class="product-info line-height-24">
                                                                    <span class="product-info-label">Tour Guide:</span>
                                                                    <span
                                                                        class="product-info-value">@foreach ($tour_guide as $valTG) @if ($value->id_tour_guild == $valTG->id) {{ $valTG->name }} @endif @endforeach <span style="color: red;"> @foreach ($tour_guides as $tour_guides_check) @if ($value->id_tour_guild == $tour_guides_check->id) (This tour guide was follow another tour) @endif @endforeach</span></span>
                                                                </div><!-- end product-info -->
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                            <td>${{ number_format($value->total_price)}}</td>

                                            <td>
                                                <div class="remove-wrap">
                                                    <a href="{{ route('cart.destroy', $value->cart_id) }}"
                                                        class="btn font-size-18"><i class="la la-times"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="section-block"></div>

                        @if (count($cart) != 0)


                            <div class="row">
                                <div class="col-lg-4 ml-auto">
                                    <div class="cart-totals table-form">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <th scope="row">
                                                        <div class="table-content">
                                                            <h3 class="title">Total</h3>
                                                        </div>
                                                    </th>
                                                    <td><span id='all_total'></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="section-block"></div>
                                        <div class="btn-box text-right pt-4">
                                            <button type="submit" class="theme-btn">Proceed to Checkout</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div><!-- end cart-wrap -->
                </form>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cart-area -->
<!-- ================================
    END CART AREA
================================= -->

<script type="text/javascript">
    function setPrice() {
        all_price = 0;
        @foreach ($cart as $value)
            @foreach ($tour_guides as $tour_guides_check)
                @if ($value->id_tour_guild != $tour_guides_check->id)
                    if(document.getElementById('cart-id-{{ $value->cart_id }}').checked==true){
                    all_price=all_price+parseInt({{ $value->total_price }});
                    }
                @endif
            @endforeach
        @endforeach
        document.getElementById('all_total').innerHTML = '$' + all_price;
    }

    window.onload = setPrice();
</script>
@stop
