@extends('admin.master.master')
@section('main')
@section('hotel','active')
@section('create_hotel','active')
@section('title','Add Hotel')


<div class="dashboard-content-wrap">
    <div class="dashboard-bread dashboard--bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Hotel</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                            <li>Hotel</li>
                            <li>Add Hotel</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div>
    </div><!-- end dashboard-bread -->
    <div class="dashboard-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title">Add Hotel</h3>
                        </div>
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form action="{{route('hotel.store')}}" class="MultiFile-intercepted" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">New Hotel</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" name="name" type="text" placeholder="Hotel's name" value="{{old('name')}}">
                                                    @if ($errors->has('name'))
                                                        <h5 style="color: red">{{$errors->first('name')}}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">New Address</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" name="address" type="text" placeholder="Hotel's address" value="{{old('address')}}">
                                                    @if ($errors->has('address'))
                                                        <h5 style="color: red">{{$errors->first('address')}}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Price (VND)</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" value="{{old('price')}}" name="price" id="price" onkeyup="format_price()" type="text" placeholder="New price">
                                                    @if ($errors->has('price'))
                                                        <h5 style="color: red">{{$errors->first('price')}}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                         <div class="col-lg-12">
                                             <div class="btn-box">
                                                 <button class="theme-btn" type="submit">Add New</button>
                                             </div>
                                        </div><!-- end col-lg-12 -->
                                    </div><!-- end row -->
                                </form>
                            </div>
                        </div>
                    </div><!-- end form-box -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-main-content -->
</div>




@stop
@section('js')
    <script>
        // $(window).click(function() {
        //     console.log('out')
        // });

        // $('#price').click(function(event){
        //     console.log('in');
        // });
        // function format_price(){
        //     var price = $('#price').val();
        //     var price_changed = price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '1');
        //     $('#price').html(price_changed);
        // }
    </script>
@endsection