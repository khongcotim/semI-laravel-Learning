@extends('customer.master.master_two')
@section('main')
@section('title','Booking')
@section('tour','activate')


<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Tour Booking</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('customer.index')}}">Home</a></li>
                            <li>Tour Booking</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START BOOKING AREA
================================= -->

<section class="booking-area padding-top-100px padding-bottom-70px">
    <div class="container">
        <form action="{{route('booking.update',$tour->id)}}" method="POST">
            @method("PUT")
@csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Your Personal Information</h3>
                    </div><!-- form-title-wrap -->
                    <div class="form-content ">
                        <div class="contact-form-action">
                            <form method="post">
                                <div class="row">
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Name</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="text" name="name" placeholder="Name" value="{{$customer->name}}">
                                                @if($errors->has('name'))
                                                <span style="color:red">{{$errors->first('name')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Identifi card</label>
                                            <div class="form-group">
                                                <span class="la la-user form-icon"></span>
                                                <input class="form-control" type="number" name="id_card" placeholder="Identifi card" value="{{$customer->id_card}}">
                                                @if($errors->has('id_card'))
                                                        <span style="color:red">{{$errors->first('id_card')}}</span>
                                                        @endif
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text" >Your Email</label>
                                            <div class="form-group">
                                                <span class="la la-envelope-o form-icon"></span>
                                                <input class="form-control" type="email" name="email" placeholder="Email address" value="{{$customer->email}}">
                                                @if($errors->has('email'))
                                                        <span style="color:red">{{$errors->first('email')}}</span>
                                                        @endif
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Phone Number</label>
                                            <div class="form-group">
                                                <span class="la la-phone form-icon"></span>
                                                <input class="form-control" type="text" name="phone" placeholder="Phone Number" value="{{$customer->phone}}">
                                                @if($errors->has('phone'))
                                                        <span style="color:red">{{$errors->first('phone')}}</span>
                                                        @endif
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-12 responsive-column">
                                        <div class="input-box">
                                            <label class="label-text">Address Line</label>
                                            <div class="form-group">
                                                <span class="la la-map-marked form-icon"></span>
                                                <input class="form-control" type="text" name="address" placeholder="Address line" value="{{$customer->address}}">
                                                @if($errors->has('address'))
                                                        <span style="color:red">{{$errors->first('address')}}</span>
                                                        @endif
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                    <div class="col-lg-12 responsive-column">
                                        <label class="label-text">Start time </label>
                                        <div class="custom-checkbox">
                                            <input class="form-control" type="date" id="r0" name="start_time" value="">
                                            @if($errors->has('start_time'))
                                                        <span style="color:red">{{$errors->first('start_time')}}</span>
                                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 responsive-column">
                                        <label class="label-text">Service</label>
                                        @foreach($services as $value)
                                        <div class="custom-checkbox">
                                        <?php $checkService=0 ?>
                                            @foreach(json_decode($tour->service) as $serviceTour)
                                                @if($value->id==$serviceTour)
                                                 <?php $checkService++ ?>
                                                @endif
                                            @endforeach
                                            @if($checkService != 0)
                                                <input type="checkbox" id="r{{$value->id}}-service" name="services[]" value="{{$value->id}}" checked>
                                                <label for="r{{$value->id}}-service">
                                                <span class="ratings d-flex align-items-center">
                                                {{$value->name}} ($0)
                                                </span>
                                            </label>
                                            @else
                                                <input type="checkbox" id="r{{$value->id}}-service" name="services[]" value="{{$value->id}}">
                                                <label for="r{{$value->id}}-service">
                                                <span class="ratings d-flex align-items-center">
                                                {{$value->name}}(${{number_format($value->price)}})
                                                </span>
                                            </label>
                                            @endif
                                            
                                        </div>
                                        @endforeach

                                    </div>

                                    <div class="col-lg-12 responsive-column">
                                        <label class="label-text">Vehicle</label>
                                        <div class="select-contain">
                                            <select class="select-contain-select" id="tour_vehicle" name="vehicle">
                                            <option value="">Not selected</option>
                                            @foreach($vehicles as $value)
                                                <option value="{{$value->id}}">{{$value->name}} (${{number_format($value->price)}})</option>
                                            @endforeach
                                            </select>
                                        </div><!-- end select-contain -->
                                    </div>
                                    <div class="col-lg-12 responsive-column">
                                        <label class="label-text">Tour Guide</label>
                                        <div class="select-contain">
                                            <select id="tour_guide" class="select-contain-select" name="tour_guide">
                                            <option value="">Not selected</option>
                                            @foreach($tour_guide as $value)

                                                <option value="{{$value->id}}">{{$value->name}}

                                                 <p style="color: #f9b851 !important"><?php $check=0 ?>@foreach($tour_guide_rate as $rate)  @if(!empty($tour_guide_rate[$value->id])) - {{$tour_guide_rate[$value->id]}} @break @else <?php $check++ ?> @endif @endforeach @if($check!=0) - 0 @endif/5 </p> - (${{number_format($value->price)}})</option>
                                            @endforeach
                                            </select>
                                        </div><!-- end select-contain -->

                                    </div>
                                    <div class="col-lg-12 responsive-column">
                                        <label class="label-text">Code</label>
                                        <div class="select-contain">
                                           <input type="text" id='countpon_code' onchange="countponCode()" class="form-control" name="code">
                                           <label class="label-text" id="countpon_code_infor" style='color: pink;'></label>
                                        </div><!-- end select-contain -->
                                    </div>
                                    <div class="col-lg-12 responsive-column">
                                        <label class="label-text">Hotel</label>
                                        <div class="select-contain">
                                            <select id="tour_hotel" class="select-contain-select" name="hotel">
                                            <option value="">Not selected</option>
                                            @foreach($hotel as $value)
                                                <option value="{{$value->id}}">{{$value->name}} (${{number_format($value->price)}})</option>
                                            @endforeach
                                            </select>
                                        </div><!-- end select-contain -->

                                    </div>
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div><!-- end form-content -->
                </div><!-- end form-box -->
                <div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">Select Payment Method</h3>
                        <div class="col-lg-12 responsive-column">
                            <label class="label-text">Method</label>
                            <div class="select-contain">
                                <select class="select-contain-select" name="payment">
                                @foreach($payment as $value)
                                    <option value="{{$value->method}}">{{$value->method}} ({{$value->price}}$)</option>
                                @endforeach
                                </select>
                            </div><!-- end select-contain -->

                        </div>
                    </div><!-- form-title-wrap -->
                    <div class="form-content">



                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="credit-card" role="tabpanel" aria-labelledby="credit-card-tab">
                                <div class="contact-form-action">

                                        <div class="row">
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Card Holder Name</label>
                                                    <div class="form-group">
                                                        <span class="la la-credit-card form-icon"></span>
                                                        <input class="form-control" type="text" name="bank_card_name" placeholder="Card holder name">
                                                        @if($errors->has('bank_card_name'))
                                                        <span style="color:red">{{$errors->first('bank_card_name')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">Card Number</label>
                                                    <div class="form-group">
                                                        <span class="la la-credit-card form-icon"></span>
                                                        <input class="form-control" type="number" name="bank_card_number" placeholder="Card number">
                                                        @if($errors->has('bank_card_number'))
                                                        <span style="color:red">{{$errors->first('bank_card_number')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-6 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Expiry Month</label>
                                                            <div class="form-group">
                                                                <span class="la la-credit-card form-icon"></span>
                                                                <input class="form-control" type="number" name="bank_card_month" placeholder="MM">
                                                                @if($errors->has('bank_card_month'))
                                                        <span style="color:red">{{$errors->first('bank_card_month')}}</span>
                                                        @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 responsive-column">
                                                        <div class="input-box">
                                                            <label class="label-text">Expiry Year</label>
                                                            <div class="form-group">
                                                                <span class="la la-credit-card form-icon"></span>
                                                                <input class="form-control" type="number" name="bank_card_year" placeholder="YY">
                                                                @if($errors->has('bank_card_year'))
                                                        <span style="color:red">{{$errors->first('bank_card_year')}}</span>
                                                        @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->

                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button class="theme-btn" type="submit">Confirm Booking</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div>

                                </div><!-- end contact-form-action -->
                            </div><!-- end tab-pane-->

                        </div><!-- end tab-content -->
                    </div><!-- end form-content -->
                </div><!-- end form-box -->
            </div><!-- end col-lg-8 -->

            <div class="col-lg-4">
                <div class="form-box booking-detail-form">
                    <div class="form-title-wrap">
                        <h3 class="title">Booking Details</h3>
                    </div><!-- end form-title-wrap -->
                    <div class="form-content">
                        <div class="card-item shadow-none radius-none mb-0">
                            <div class="card-img pb-4">
                                <a href="tour-details.html" class="d-block">
                                    <img src="{{ url('customers') }}/images/{{$tour->image}}" alt="tour-img">
                                </a>
                            </div>

                            <div class="card-body p-0">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="card-title">{{$tour->name}}</h3>
                                        <p class="card-meta">{{$tour->to}}</p>
                                    </div>

                                </div>
                                <div class="card-rating">
                                    <span class="badge text-white">  @if(!empty($rating)) {{$rating}} @else 0 @endif /5</span>
                                    <span class="review__text">Average</span>
                                    <span class="rating__text">({{$review}} Reviews)</span>
                                </div>
                                <div class="section-block"></div>
                                <ul class="list-items list-items-2 list-items-flush py-2">
                                    <li class="font-size-15"><span class="w-auto d-block mb-n1"><i class="la la-clock mr-1 text-black font-size-17"></i>Travel time</span>{{$tour->time}}</li>
                                    <li class="font-size-15"><span class="w-auto d-block mb-n1"><i class="la la-map-marker mr-1 text-black font-size-17"></i>Location</span>{{$tour->to}}</li>
                                </ul>
                            </div>

                            <div class="sidebar-widget-item">
                            <h3 class="card-title pb-3">Set people</h3>
                                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                    <label class="font-size-16">Adults <span>Age 18+</span></label>
                                    <div class="qtyBtn d-flex align-items-center">
                                        <div class="qtyDec"><i class="la la-minus"></i></div>
                                        <input id="adult" type="text" name="adult" value="{{$adult}}">
                                        @if($errors->has('adult'))
                                                <span style="color:red">{{$errors->first('adult')}}</span>
                                                @endif
                                        <div class="qtyInc"><i class="la la-plus"></i></div>
                                    </div>
                                </div><!-- end qty-box -->
                                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                    <label class="font-size-16">Children <span>2-12 years old</span></label>
                                    <div class="qtyBtn d-flex align-items-center">
                                        <div class="qtyDec"><i class="la la-minus"></i></div>
                                        <input id="children" type="text" name="children" value="{{$children}}">
                                        @if($errors->has('chidren'))
                                                <span style="color:red">{{$errors->first('chidren')}}</span>
                                                @endif
                                        <div class="qtyInc"><i class="la la-plus"></i></div>
                                    </div>
                                </div><!-- end qty-box -->
                                <div class="qty-box mb-2 d-flex align-items-center justify-content-between">
                                    <label class="font-size-16">Infants <span>0-2 years old</span></label>
                                    <div class="qtyBtn d-flex align-items-center">
                                        <div class="qtyDec"><i class="la la-minus"></i></div>
                                        <input id="infant" type="text" name="infant" value="{{$infant}}">
                                        @if($errors->has('infant'))
                                                <span style="color:red">{{$errors->first('infant')}}</span>
                                                @endif
                                        <div class="qtyInc"><i class="la la-plus"></i></div>
                                    </div>
                                </div><!-- end qty-box -->
                            </div><!-- end sidebar-widget-item -->
                            <div class="card-body p-0">
                                <h3 class="card-title pb-3">Order Details</h3>
                                <div class="section-block"></div>
                                <ul class="list-items list-items-2 py-3">
                                    <li id="total_people"></li>
                                </ul>
                                <div class="section-block"></div>
                                <ul class="list-items list-items-2 pt-3">

                                    <li id="total"></li>
                                </ul>
                            </div>
                        </div><!-- end card-item -->
                    </div><!-- end form-content -->
                </div><!-- end form-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </form>
    </div><!-- end container -->
</section><!-- end booking-area -->

<!-- ================================
    END BOOKING AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START INFO AREA
================================= -->
<section class="info-area info-bg padding-top-90px padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 responsive-column">
                <a href="#" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb text-color-2">
                        <i class="la la-phone"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Need Help? Contact us</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </p>
                    </div><!-- end info-content -->
                </a><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <a href="#" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb-2 text-color-3">
                        <i class="la la-money"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Payments</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </p>
                    </div><!-- end info-content -->
                </a><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column">
                <a href="#" class="icon-box icon-layout-2 d-flex">
                    <div class="info-icon flex-shrink-0 bg-rgb-3 text-color-4">
                        <i class="la la-times"></i>
                    </div><!-- end info-icon-->
                    <div class="info-content">
                        <h4 class="info__title">Cancel Policy</h4>
                        <p class="info__desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </p>
                    </div><!-- end info-content -->
                </a><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end info-area -->
<!-- ================================
    END INFO AREA
================================= -->

<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="section-heading">
                    <h2 class="sec__title font-size-30 text-white">Subscribe to see Secret Deals</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="subscriber-box">
                    <div class="contact-form-action">
                        <form action="#">
                            <div class="input-box">
                                <label class="label-text text-white">Enter email address</label>
                                <div class="form-group mb-0">
                                    <span class="la la-envelope form-icon"></span>
                                    <input class="form-control" type="email" name="email" placeholder="Email address">
                                    <button class="theme-btn theme-btn-small submit-btn" type="submit">Subscribe</button>
                                    <span class="font-size-14 pt-1 text-white-50"><i class="la la-lock mr-1"></i>Don't worry your information is safe with us.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cta-area -->
<!-- ================================
    END CTA AREA
================================= -->

<script type="text/javascript">
    function getScrollPosition()
    {
        tourPrice=parseInt({{$tour->price}});
        adult= parseInt( document.getElementById('adult').value);
        children= parseInt( document.getElementById('children').value);
        infant = parseInt( document.getElementById('infant').value);
        totalPrice=tourPrice*adult+tourPrice*children/2+tourPrice*infant/10;
        @foreach($services as $value)
        <?php $checkService=0 ?>
        @foreach(json_decode($tour->service) as $serviceTour)
                @if($value->id==$serviceTour)
                    <?php $checkService++ ?>
                @endif
            @endforeach
            @if($checkService == 0)
            if(document.getElementById('r{{$value->id}}-service').checked==true){
                totalPrice=totalPrice+parseInt({{$value->price}})
            }
            @endif
        
        @endforeach
        @foreach($vehicles as $value)
        if(document.getElementById('tour_vehicle').value=={{$value->id}}){
            if('{{$value->name}}'.indexOf('bay')==parseInt('-1') || '{{$value->name}}'.indexOf('Bay')==parseInt('-1')){
                    totalPrice=totalPrice+parseInt({{$value->price}})*(adult+children);
                }else{
                    totalPrice=totalPrice+parseInt({{$value->price}})*parseInt({{$tour->distant}})*(adult+children);
                }
        }
        @endforeach
        @foreach($tour_guide as $value)
            if(document.getElementById('tour_guide').value=={{$value->id}}){
                totalPrice=totalPrice+parseInt({{$value->price}});
            }
        @endforeach
        @foreach($hotel as $value)
            if(document.getElementById('tour_hotel').value=={{$value->id}}){
                totalPrice=totalPrice+parseInt({{$value->price}});
            }
        @endforeach

        @foreach($code as $value)
            if(document.getElementById('countpon_code').value=={{$value->name}}){
                totalPrice=totalPrice*(100-parseInt({{$value->percent_reduce}}))/100;
            }
        @endforeach
        document.getElementById('total_people').innerHTML = '<span >Travellers:</span>' + (parseInt(document.getElementById('adult').value) +parseInt(document.getElementById('children').value)+parseInt(document.getElementById('infant').value)  );
        document.getElementById('total').innerHTML = '<span >Total:</span>$'+ totalPrice;




    }
    function countponCode(){
        countponCheck=0;
        @foreach($code as $value)
        if(document.getElementById('countpon_code').value=={{$value->name}}){
            document.getElementById('countpon_code_infor').innerHTML="Code reduce {{$value->percent_reduce}}%";
            countponCheck=1;
        }
        @endforeach
        if(countponCheck==0){
            document.getElementById('countpon_code_infor').innerHTML="";

        }
    }
   window.setInterval('getScrollPosition()', 350);
</script>
@stop
