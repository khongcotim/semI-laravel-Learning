@extends('admin.master.master')
@section('main')
@section('vehicle','active')
@section('title','Edit Vehicle')

<div class="dashboard-content-wrap">
    <div class="dashboard-bread dashboard--bread dashboard-bread-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">Vehicle</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                            <li>Vehicle</li>
                            <li>Edit Vehicle</li>
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
                            <h3 class="title">Edit Vehicle</h3>
                        </div>
                        <div class="form-content">
                            <div class="contact-form-action">
                                <form action="{{route('vehicle.update',$item_founded->id)}}" class="MultiFile-intercepted" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item_founded->id}}">
                                    <div class="row">
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text">Vehicle's name</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" name="name" type="text" placeholder="Vehicle's name" value="{{$item_founded->name}}">
                                                    @if ($errors->has('name'))
                                                        <h5 style="color: red">{{$errors->first('name')}}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        <div class="col-lg-12 responsive-column">
                                            <div class="input-box">
                                                <label class="label-text" id="price">Price ( VND/km )</label>
                                                <div class="form-group">
                                                    <i class="las la-pen-nib form-icon"></i>
                                                    <input class="form-control" value="{{$item_founded->price}}" name="price" type="text" placeholder="New price">
                                                    @if ($errors->has('price'))
                                                        <h5 style="color: red">{{$errors->first('price')}}</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Links</label>
                                                <div class="form-group">
                                                    <select name="status" class="form-control" id="">
                                                        <option value="0" {{$item_founded->status=="0"? 'selected':''}}>Hide</option>
                                                        <option value="1" {{$item_founded->status=="1"? 'selected':''}}>Show</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                        @endif
                                         <div class="col-lg-12">
                                             <div class="btn-box">
                                                 <button class="theme-btn" type="submit">Update</button>
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
        function change_title(){
            var vehicle_name = $('#check_vehicle').val();
            if (vehicle_name.includes("bay") || vehicle_name.includes("Bay")) {
                $('#price').html('Price ( VND/Ticket )')
            }else{
                $('#price').html('Price ( VND/km )')
            }
        }
    </script>
@endsection