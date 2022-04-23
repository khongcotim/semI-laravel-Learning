@extends('customer.master.master_two')
@section('main')
@section('title','404 Not Found')
<!-- =======================
         END HEADER AREA
================================= -->

<!-- ================================
    START ERROR AREA
================================= -->
<section class="error-area section--padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="error-img">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="900px" height="380px">
                        <image  x="0px" y="0px" width="900px" height="380px"  xlink:href="{{url('customers')}}/images/404_image.jpg" />
                    </svg>
                </div><!-- end error-img-->
                <div class="section-heading padding-top-35px">
                    <h2 class="sec__title mb-0">Ooops! This Page Does Not Exist</h2>
                    <p class="sec__desc pt-3">We're sorry, but it appears the website address you entered was <br> incorrect, or is temporarily unavailable.</p>
                </div>
                <div class="btn-box padding-top-30px">
                    <a href="{{route('customer.index')}}" class="theme-btn"><i class="la la-reply mr-1"></i> Back to Home</a>
                </div>
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end error-area -->
<!-- ================================
    END ERROR AREA
================================= -->

@stop